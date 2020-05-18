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



	# add salt
	mv .env .envx
	tail -r .envx | tail -n +18 | tail -r >> .env
	rm .envx

	echo  -e "

	\033[32;5m !! Attention! Action required !! ${NC}

	${Green}
	Setup your Apache/mamp To point to $(pwd)/web
	Enter your dev url, ex http://blockpress.loc ${NC}

	 "
	while [[ $string == '' ]] # While string is different or empty...
	do
		read -p "Enter url: " string # Ask the user to enter a string
		echo "Enter a valid string" # Ask the user to enter a valid string
	done



 	echo "WP_SITEURL=$string/wp" >> .env
	echo "WP_HOME=$string" >> .env
	echo "DEVURL=$string" >> .env
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
	mv temp/blockpress-child web/app/themes/blockpress-child
	rm -rf temp

	npm install
	yarn build

	echo  -e "

	\033[32;5m !! Attention! Action required !! ${NC}

	"
	read -p "You have to add your Database detail to .env file to continue, Press enter to continue"

	wp core install --url="blockpress.loc"  --title="Blockpress" --admin_user="super" --admin_password="admin" --admin_email="admin@blockpress.loc"

	wp theme activate blockpress-child

	open $string
	echo -e " ${Green}  Done, Enjoy Blockpress, E.P. ${NC}"
}

function export_to_vanilla(){

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
	mv temp Vanilla
	open Vanilla

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
            export_to_vanilla
            ;;
        "Install Devtools")
            echo "you chose choice 2"
            ;;
        "Install Block Generator")
            echo "coming soon"
            ;;
        "Quit")
            break
			exit
            ;;
        *) echo "invalid option $REPLY";;
    esac
done





# mv /usr/local/bin
#chmod +x install.sh

