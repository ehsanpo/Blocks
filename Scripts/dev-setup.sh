composer create-project roots/bedrock .
composer require rbdwllr/wordpress-salts-generator
composer require wpackagist-plugin/winsite-image-optimizer
composer require timber/timber
composer require mindkomm/timmy
#composer require wpackagist-plugin/advanced-custom-fields
composer require wpackagist-plugin/wordfence


# add salt
mv .env .envx 
tail -r .envx | tail -n +18 | tail -r >> .env
echo "ACF_PRO_KEY=Your-Key-Here \nDEVURL=http://blocks.loc/ \n" >> .env
composer require rbdwllr/wordpress-salts-generator
vendor/bin/wpsalts dotenv --clean >> .env
echo "DB_HOST='127.0.0.1' " >> .env  #need it for wp-cli


#WP -CLI
#wp plugin activate block-lab
#wp plugin activate advanced-custom-fields
##wp plugin activate winsite-image-optimizer
##wp plugin activate wordfence

## Get the theme
git clone git@github.com:ehsanpo/Blocks.git temp

cp -a temp/root/. .
mv temp/blockpress web/app/themes/blockpress
rm -rf temp


#

npm install

# Måste konfigurera databas 
# ändra devurl på .env filen
# sätt upp mamp  mot /web


wp core install --url="blockpress.loc"  --title="Blockpress" --admin_user="super" --admin_password="admin" --admin_email="admin@blockpress.loc"


yarn dev



