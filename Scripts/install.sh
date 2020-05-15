#!/bin/bash
Version= '0.0.1' 
Green='\033[0;32m'
NC='\033[0m' # No Color

function composer_install {
    #brew install homebrew/php/php70
    brew install composer
}

function wpcli_install {
    brew install wp-cli
}

echo -e "${Green}

 ______          _____  _______ _     _  _____   ______ _______ _______ _______
 |_____] |      |     | |       |____/  |_____] |_____/ |______ |______ |______
 |_____] |_____ |_____| |_____  |    \_ |       |    \_ |______ ______| ______|



${Green} Dev setup ${Version}                                                                   
"

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




#Add woocomerce


# Install PHP 7.0

#$ brew install homebrew/php/php70
# Install Valet
#$ composer global require laravel/valet

# Install DnsMasq and configure Valet to launch on system start
#$ valet install

# Install MariaDB
#$ brew install mariadb



# mv usr/local/bin
#chmod +x install.sh