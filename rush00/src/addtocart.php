<?php
include 'getdata.php';

session_start();

print_r($_POST);
echo "<br />";
addToCart($_POST['submit']);
foreach (getCart() as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />";
}
?>
