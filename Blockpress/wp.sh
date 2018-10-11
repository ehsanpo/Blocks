#!/bin/bash
mypwd="$PWD"

if [ ! -d "$mypwd/public_html" ]; then
	echo "Wrong folder!"
 	exit
fi

if [ $# -eq 0 ]; then
    echo "No arguments provided"
    exit 1
fi


if [  -f "$mypwd/public_html/theme/blocks/$1.php" ] || [ -f "$mypwd/public_html/theme/blocks/$1_block.php" ]  ; then
  echo "Block exists"
  exit 1
fi

PHPHFILE='<?php
class '${1}'_block extends TwigBlock {
	function __construct() {
		$this->id = "'${1}'-block";
		$this->name = "'${1}' Block";

		parent::__construct();
	}

	function define(&$fields) {
		$fields[] = array(

		);
		
	}

	function get_template_data($data) {
		return $data;
	}
}

new '${1}'_block();
'

echo "$PHPHFILE" >> "$mypwd/public_html/theme/blocks/$1_block.php"
echo 'PHP file created.'

echo '<div class="'${1}'-block"> 

</div>' >> "$mypwd/public_html/theme/views/blocks/$1_block.twig"

echo 'Twig file created.'

echo '.'${1}'-block{

}' >> "$mypwd/public_html/theme/assets/sass/blocks/$1_block.scss"

echo '@import "blocks/'${1}'-block.scss";' >> "$mypwd/public_html/theme/assets/sass/main.scss"
echo 'CSS file created.'