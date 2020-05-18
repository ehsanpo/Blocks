#!/bin/bash
Version= '0.0.1'
Green='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${Green}

 ______          _____  _______ _     _  _____   ______ _______ _______ _______
 |_____] |      |     | |       |____/  |_____] |_____/ |______ |______ |______
 |_____] |_____ |_____| |_____  |    \_ |       |    \_ |______ ______| ______|



${Green} Dev setup ${Version}
"


function wpcli_install {
    brew install wp-cli
}
function composer_install {
    #brew install homebrew/php/php70
    brew install composer
}
function devtools_install {

	echo "Welcome To Blockpress dev tools installer"
	echo "Requred tools have (*) after quastions"
	echo -e  "Anwser with 0[No] and 1[Yes] ${NC}"
	read -p "Press enter to continue"

	while true; do
		read -p "Instal Composer? * " yn
		case $yn in
			[1]* ) composer_install; break;;
			[0]* ) break ;;
			* ) echo "Please answer 0 or 1";;
		esac
	done

	while true; do
		read -p "Instal wp-cli? * " yn
		case $yn in
			[1]* ) wpcli_install; break;;
			[0]* ) break ;;
			* ) echo "Please answer 0 or 1";;
		esac
	done

}

function install_blockpress(){

	composer create-project roots/bedrock bedrock
	mv bedrock/* bedrock/.* .
	rm -r bedrock
	composer require rbdwllr/wordpress-salts-generator
	composer require wpackagist-plugin/winsite-image-optimizer
	composer require timber/timber
	composer require mindkomm/timmy
	composer require wpackagist-plugin/wordfence

	echo Setup your Apache/mamp To point to $(pwd)/web
	echo Enter your dev url, ex http://blockpress.loc
	read DEVURL

	# add salt
	mv .env .envx
	tail -r .envx | tail -n +18 | tail -r >> .env
	echo "DEVURL=$DEVURL" >> .env
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


PS3='Please enter your choice: '
options=( "Install Blockpress" "Install Devtools" "Install Block Generator" "Export to Vanlia Wordpress" "Quit")
select opt in "${options[@]}"
do
    case $opt in
		"Install Blockpress")
			install_blockpress
            ;;
        "Export to Vanlia Wordpress")
            echo "you chose choice 1"
            ;;
        "Install Devtools")
            echo "you chose choice 2"
            ;;
        "Option 3")
            echo "you chose choice $REPLY which is $opt"
            ;;
        "Quit")
            break
            ;;
        *) echo "invalid option $REPLY";;
    esac
done





# mv /usr/local/bin
#chmod +x install.sh

