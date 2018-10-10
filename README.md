# Blocks
With Blocks content strategy, you no longer need to create sites with HTML in the content editor! Block is structured pieces of content that removes the need for messy markup interspersed with your content.

![Blocks](https://raw.githubusercontent.com/ehsanpo/Blocks/master/public_html/theme/assets/img/favicon.jpg)

## Build Wordpress site with Blocks

In each project, After requirements analysis, we will find a number of Blocks that can be used to build content on the website. Each website for its cut-through blocks that they can use in different places to display different types of content such as images, texts, slideshows ... This way, the customer can easily create pages by selecting any blocks that fit the content the customer wants show.

## Getting Started

### Webpack 4
Install:
`yarn install`

To develop :
`yarn watch `

 To build :
`yarn build `

Deploy: 
`yarn deploy`


### Install dependencies

First you will need to install [Composer](https://getcomposer.org/) globally. Then run `composer install` in the same folder as this readme.

### Configuration

Configuration is done via a file named `.env` that should exist in the same folder as this readme. Create the file by starting with the `dotenv.example`.

For development use `development` as your environment and otherwise use `production`.

### Server configuration

Point your server to the subfolder `public_html`.

### Theme

The theme is located in `public_html/theme`.


## Working with the project

The theme uses [Timber](https://github.com/jarednova/timber/wiki) to use Twig templates. The class `Site` in `functions.php` can and should be used for most configuration of the theme.

### Advanced Custom Fields

ACF is included in the theme, but editing of fields in the production environment is disabled. Do not rely on the database for storing of fields. All fields must be transferred to `functions.php` before committing functions that rely on them.

### Page Composer

The theme includes Page Composer to allow pages to be composed of blocks. Blocks are added in the theme subfolder `blocks` with views in `views/blocks`. Add any blocks that should be active to `Site` in `functions.php`.

### Composer dependencies

Edit `composer.json` for dependencies. For plugins that are required for the site function add them both to the `require` section and then also under `installer-paths` under the `mu-plugins` section.

To change the version of ACF you need to be update three places, under the package defined in `repository` for version and in the URL, and under `require`.

## Using bash script to create new Blocks

To be able to run the script first run chmod `u+x wp.sh` then run `./wp.sh` blockname to create new blocks.

The script will create 3 files:

PHP file in /public_html/theme/blocks/

Twig file in /public_html/theme/views/blocks/

CSS file in /public_html/theme/assets/sass/blocks/


## Deploying

This project uses [Flightplan](https://github.com/pstadler/flightplan) to manage deployment to servers. Install it globally via `npm`:

`npm install -g flightplan`

And then locally in this folder: `npm install` to fetch the local Flightplan instance.

Run `fly init:ENVIRONMENT` to setup the server and then start using `fly deploy:ENVIRONMENT`.


## Dev Stack: 
[Timber](https://github.com/timber/timber),  [Timmy](https://github.com/mindkomm/timmy), [Composer](https://getcomposer.org/), [Bedrock autoloader](https://roots.io/bedrock/docs/mu-plugins-autoloader/), [ACF](https://www.advancedcustomfields.com/), [Flightplan](https://github.com/pstadler/flightplan) 
