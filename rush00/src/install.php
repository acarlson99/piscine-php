#! /usr/bin/php
<?php
include 'getdata.php';

mkdir("../private");
unlink(USRFILE);
file_put_contents(USRFILE, serialize_(array()));
unlink(BASKETFILE);
file_put_contents(BASKETFILE, serialize_(array()));

unlink(ITEMFILE);
$items = array(
	'apple' => array('name' => 'apple', 'price' => 15, 'tags' => array('fruit', 'apple', 'food'), 'img' => 'https://www.markon.com/sites/default/files/styles/large/public/pi_photos/Apples_Golden_Delicious_Hero.jpg'),
	'pear' => array('name' => 'pear', 'price' => 12, 'tags' => array('fruit', 'pear', 'food'), 'img' => 'https://cdn1.medicalnewstoday.com/content/images/hero/285/285430/285430_1100.jpg'),
	'bicycle' => array('name' => 'bicycle', 'price' => 110, 'tags' => array('exercise', 'activity', 'bike'), 'img' => 'http://cdn.shopify.com/s/files/1/1245/1481/products/Hero_600_square2_1024x1024.jpg?v=1546547634'),
	'passionfruit' => array('name' => 'passionfruit', 'price' => 12, 'tags' => array('fruit', 'passionfruit', 'passion', 'food'), 'img' => 'https://www.rachaelraymag.com/.image/t_share/MTQ1NzM5NjAxNjE1NTI5OTA0/passion-fruit-half-102951784.jpg'),
);
file_put_contents(ITEMFILE, serialize_($items));

unlink(BASKETFILE);
