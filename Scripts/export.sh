#!/bin/bash

wp cli update
yarn vanilla
mkdir temp
wp core download --path=temp
cp -r web/app/themes/blockpress  temp/wp-content/themes
cp -r web/app/themes/blockpress-child  temp/wp-content/themes
cp -r vendor temp/wp-content/themes/blockpress
rm -r temp/wp-content/themes/blockpress/assets/sass
rm -r temp/wp-content/themes/blockpress/assets/script
cp -r web/app/plugins temp/wp-content/plugins
cd temp/wp-content/plugins
yes '' | composer  init --name blockpress/vanliapress
composer require timber/timber
composer require mindkomm/timmy

