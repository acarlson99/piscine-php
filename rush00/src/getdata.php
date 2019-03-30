<?php
define("USRFILE", "../private/passwd");
define("BASKETFILE", "../private/baskets");
define("ITEMFILE", "../private/items");

function	getUsers() {
	return (unserialize(file_get_contents(USRFILE)));
}

function	getCart() {
	return (unserialize(file_get_contents(BASKETFILE)));
}

function	getItems() {
	return (unserialize(file_get_contents(ITEMFILE)));
}

// TODO: finish addToCart
function	addToCart($item, $username) {
	$cart = getCart();
}
?>
