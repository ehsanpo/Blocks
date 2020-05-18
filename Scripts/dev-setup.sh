#!/bin/bash


function(){

composer create-project roots/bedrock .
composer require rbdwllr/wordpress-salts-generator
composer require wpackagist-plugin/winsite-image-optimizer
composer require timber/timber
composer require mindkomm/timmy
composer require wpackagist-plugin/wordfence


# add salt
mv .env .envx
tail -r .envx | tail -n +18 | tail -r >> .env
echo "DEVURL=http://blockpress.loc/" >> .env
composer require rbdwllr/wordpress-salts-generator
vendor/bin/wpsalts dotenv --clean >> .env
echo "DB_HOST='127.0.0.1' " >> .env  #need it for wp-cli
rm .envx

#WP -CLI
#wp plugin activate block-lab
#wp plugin activate advanced-custom-fields
##wp plugin activate winsite-image-optimizer
##wp plugin activate wordfence

## Get the theme
git clone git@github.com:ehsanpo/Blocks.git temp
cp -a temp/root/. .
mv temp/blockpress web/app/themes/blockpress
mv temp/blockpress-child web/app/themes/blockpress-child
rm -rf temp

npm install
yarn build

Måste konfigurera databas
read -p "You have to add your Database detail to .env file to continue, Press enter to continue"

wp core install --url="blockpress.loc"  --title="Blockpress" --admin_user="super" --admin_password="admin" --admin_email="admin@blockpress.loc"

echo "Done, Enjoy Blockpress, E.P. "
}
