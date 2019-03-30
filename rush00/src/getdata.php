<?php
session_start();

define("USRFILE", "../private/passwd");
define("BASKETFILE", "../private/baskets");
define("ITEMFILE", "../private/items");

function	getUsers() {
	return (unserialize(file_get_contents(USRFILE)));
}

function	getCart() {
	if (isset($_SESSION['login']))
		return (unserialize(file_get_contents(BASKETFILE)));
	else
		return ($_SESSION['session_cart']);
}

function	getItems() {
	return (unserialize(file_get_contents(ITEMFILE)));
}

function	addCartToDatabase($cart, $username) {
	echo "TODO: implement\n";
}

function	addToCart($itemname) {
	if (isset($_SESSION['login'])) {
		$username = $_SESSION['login'];
		$cart = getCart();
		$cart[$username][] = getItems()[$itemname];
		file_put_contents(BASKETFILE, serialize($cart));
	}
	else {
		if (!isset($_SESSION['session_cart']))
			$_SESSION['session_cart'] = array();
		$_SESSION['session_cart'][] = getItems()[$itemname];
	}
}
?>
