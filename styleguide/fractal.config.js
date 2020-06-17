'use strict';

/*
* Require the path module
*/
const path = require('path');

/*
 * Require the Fractal module
 */
const fractal = module.exports = require('@frctl/fractal').create();
const mandelbrot = require('@frctl/mandelbrot');

const myCustomisedTheme = mandelbrot({
    skin: "black",
    panels: ['html', 'view', 'context', 'resources', 'info', 'notes']

});


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


fractal.components.set('default.context', {
    'title': 'FooCorp',
    'text': 'Lorem',
    'people': [
        "Yehuda Katz",
        "Alan Johnson",
        "Charles Jolley",
      ],
});


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