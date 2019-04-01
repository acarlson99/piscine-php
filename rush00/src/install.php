#! /usr/bin/php
<?php
include 'getdata.php';

if (!file_exists("../private"))
	mkdir("../private");
if (file_exists(USRFILE))
	unlink(USRFILE);
if (file_exists(BASKETFILE))
	unlink(BASKETFILE);

if (file_exists(ITEMFILE))
	unlink(ITEMFILE);
$items = array(
	'mcintosh' => array('name' => 'mcintosh', 'price' => 2, 'tags' => array('red', 'blue', 'tangy', 'tart', 'applesauce', 'snack', 'pie'), 'img' => 'https://www.stemilt.com/wp-content/uploads/2016/07/McIntosh.png'),
	'fuji' => array('name' => 'fuji', 'price' => 3, 'tags' => array('red', 'yellow', 'year', 'popular', 'sweet', 'firm'), 'img' => 'https://images-na.ssl-images-amazon.com/images/I/81pO3uqRDML._SY355_.jpg'),
	'red_delicious' => array('name' => 'red_delicious', 'price' => 2, 'tags' => array('red', 'delicious'), 'img' => 'http://usapple.org/wp-content/uploads/2016/02/apple-red-delicious-337x335.png'),
	'gala' => array('name' => 'gala', 'price' => 2.5, 'tags' => array('red', 'orange', 'crisp', 'juicy', 'year'), 'img' => 'http://usapple.org/wp-content/uploads/2016/02/apple-gala-337x335.png'),
	'crispin' => array('name' => 'crispin', 'price' => 2, 'tags' => array('crisp', 'mutsu', 'green', 'sweet'), 'img' => 'http://ad.thevictorapplefarm.com/images/ourapples/crispinpage.jpg'),
	'golden_delicious' => array('name' => 'golden_delicious', 'price' => 3, 'tags' => array('golden', 'delicious', 'gold', 'best', 'insane', 'fantastic', 'orgasmic'), 'img' => 'http://usapple.org/wp-content/uploads/2016/02/apple-golden-delicious-337x335.png'),
);
file_put_contents(ITEMFILE, serialize_($items));

if (file_exists(BASKETFILE))
	unlink(BASKETFILE);
