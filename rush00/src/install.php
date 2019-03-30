#! /usr/bin/php
<?php
mkdir("../private");
unlink("../private/passwd");
file_put_contents("../private/passwd", serialize(array()));
unlink("../private/baskets");
touch("../private/baskets", serialize(array()));

unlink("../private/items");
$items = array(
	'apple' => array('name' => 'apple', 'price' => 15, 'tags' => array('fruit', 'family'), 'img' => 'https://www.markon.com/sites/default/files/styles/large/public/pi_photos/Apples_Golden_Delicious_Hero.jpg'),
	'pear' => array('name' => 'pear', 'price' => 12, 'tags' => array('fruit', 'family'), 'img' => 'https://cdn1.medicalnewstoday.com/content/images/hero/285/285430/285430_1100.jpg'),
	'bicycle' => array('name' => 'bicycle', 'price' => 110, 'tags' => array('exercise', 'family'), 'img' => 'http://cdn.shopify.com/s/files/1/1245/1481/products/Hero_600_square2_1024x1024.jpg?v=1546547634'),
);
file_put_contents("../private/items", serialize($items));
