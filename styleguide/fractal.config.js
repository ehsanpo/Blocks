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


config = {
    description: 'Generate empty Component'
};
function newComponents(args, done){
	const app = this.fractal;
	console.log(args);
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
fractal.cli.command('new-comp <name> <path>', newComponents, config); // register the command




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
