<?php
include 'getdata.php';

session_start();

print_r($_POST);
echo "<br />";
print_r(getItems()[$_POST['submit']]);
if ($_SESSION['logged_on'])
	addToCartUsr($_POST['submit'], $_SESSION['logged_on']);
else
	addToCartSesh($_POST['submit']);
echo "<br />OUT FUNC CART<br />";
print_r(getCart());
?>
