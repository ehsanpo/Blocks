'use strict';

/*
* Require the path module
*/
const path = require('path');
const fs = require('fs');

/*
 * Require the Fractal module
 */
const fractal = module.exports = require('@frctl/fractal').create();
const mandelbrot = require('@frctl/mandelbrot');
const consolidate = require('@frctl/consolidate');

/*
 * Require data
 */

 const data =  require('./data.js');

/*
 * Require fields & ID generator
 */

const {	acf_field_group,acf_field} =  require('./inc/fields.js');
const uniqid =  require('./inc/uniqid.js');

/*
 * Require Twig
 */
const twigAdapter = consolidate('twig');
fractal.components.engine(twigAdapter);
fractal.components.set('ext', '.twig');


/*
 * Give your project a title.
 */
fractal.set('project.title', 'Blockpress');
fractal.set('project.version', 'v1.0');
fractal.set('project.author', 'Ehsan Pourhadi');

/*
 * Tell Fractal where to look for components.
 */
fractal.components.set('path', path.join(__dirname, 'components'));

/*
 * Tell Fractal where to look for documentation pages.
 */
fractal.docs.set('path', path.join(__dirname, 'docs'));

/*
 * Tell the Fractal web preview plugin where to look for static assets.
 */
const myCustomisedTheme = mandelbrot({
    skin: "black",
    panels: ['html', 'view', 'context', 'resources', 'info', 'notes']

});
fractal.web.set('static.path', path.join(__dirname, 'public'));
fractal.web.theme(myCustomisedTheme);

/* change the "assets" tab to the present file type */
fractal.components.set('resources', {
    scss: {
        label: 'SCSS',
        match: ['**/*.scss']
    },
    css: {
        label: 'CSS',
        match: ['**/*.css']
    },
    other: {
        label: 'Other Assets',
        match: ['**/*', '!**/*.scss', '!**.css']
    }
});

/*
 * Set custom data
 */
fractal.components.set('default.context',data );


/*
 * Set custom commands
 */

let config = {
    description: 'Lists components in the project'
};

function listComponents(args, done){
    const app = this.fractal;
    for (let item of app.components.flatten()) {
        this.log(`${item.handle} - ${item.status.label}`);
    }
    done();
};

fractal.cli.command('list-components', listComponents, config); // register the command


function newComponents(args, done){
	const app = this.fractal;
	const name = args.name.replace(/[^a-z]/gi, '')
	const path = 'components/' + args.path + '/' + name + '/' + name ;
	const dir = 'components/' + args.path + '/' + name ;
	const packageInfo =  {
		"name": name.toLowerCase(),
	}
	if (!fs.existsSync(dir)){
		fs.mkdirSync(dir);
		fs.writeFileSync(path + '.twig', '', function (err) {
			if (err) throw err;
			this.log('Twig File is created successfully.');
		});
		fs.writeFileSync(path + '.scss', '', function (err) {
			if (err) throw err;
			this.log('Scss File is created successfully.');
		});
		fs.writeFileSync(path + '.php', '', function (err) {
			if (err) throw err;
			this.log('PHP File is created successfully.');
		});
		fs.writeFileSync(dir + '/package.json', JSON.stringify(packageInfo), function (err) {
			if (err) throw err;
			this.log('Package.json File is created successfully.');
		});


	}else{
		throw 'Block already exist'
	}


    done();
};
fractal.cli.command('new-comp <name> <path>', newComponents,{
    description: 'Generate empty Component'
}); // register the command


function ex(args, done){
	const app = this.fractal;
	const path = 'components/blocks/' + args.name + '/';
	const jsonPath = path + args.name  + '.json'

	let obj = JSON.parse(fs.readFileSync( jsonPath, 'utf8'));
	let group = acf_field_group;

	group.key = uniqid('group_')
	group.title =  obj.title;
	group.description = obj.description;
	group.location[0][0].value = "acf/" + obj.name;
	let fields = [];

	for (const key in obj.fields) {
		const element = obj.fields[key];
		let field2 = {...acf_field};
		field2.key = uniqid('field_');
		field2.label = element.label;
		field2.name = key;
		field2.type = element.type;
		fields.push(field2);
	}

	group.fields = fields;


	let field_converted =  buildPhpArraysFromJson(fields);

	console.log(field_converted)

	fs.writeFileSync( path + args.name + '_fields.json', JSON.stringify(group, null, 4) , function (err) {
		if (err) throw err;
		this.log('Fields File is created successfully.');
	});

	fs.readFile("inc/blockClass.php", "utf8", function(err, data) {

		data = data.replace(/{#name#}/g, args.name)
		data = data.replace(/{#title#}/g, group.title )
		data = data.replace(/{#description#}/g, group.description )

		fs.writeFileSync( path + args.name + '_fields.php', data , function (err) {
			if (err) throw err;
			this.log('Fileds File is created successfully.');
		});
	});
}
fractal.cli.command('ex <name>', ex, {
    description: 'Export components to BlockPress'
}); // register the command


function buildPhpArraysFromJson(fields) {

	let res = "";

	for (const field of fields) {
		res += 'array('
		for (const key of Object.keys(field)) {
			res += `'${key}' => '${field[key]}',`
		}
		res = res.slice(0, -1);
		res += '),'
	}

	return res.slice(0, -1);
}


/*
Sub component
component


[block].hbs
config.yml


@component-name--variant-name


Global:
    SCSS
    Context
*/
