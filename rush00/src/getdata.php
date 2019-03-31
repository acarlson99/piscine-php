<?php
if (!isset($_SESSION))
	session_start();

define("USRFILE", "../private/passwd");
define("BASKETFILE", "../private/baskets");
define("ITEMFILE", "../private/items");
define("ARCHIVES", "../private/archivedorders");

function	serialize_($data) {
	return (base64_encode(serialize($data)));
}

function	unserialize_($data) {
	return (unserialize(base64_decode($data)));
}

function	authUsr($login, $passwd) {
	$hashpw = hash("whirlpool", $passwd);
	if (file_exists("../private/passwd"))
		$db = unserialize_(file_get_contents("../private/passwd"));
	else
		return (FALSE);
	foreach($db as $key => $val) {
		if ($key == $login) {
			if ($val['passwd'] == $hashpw && $val['login'] == $login)
				return (TRUE);
			else
				return (FALSE);
		}
	}
	return (FALSE);
}

function	addUsr($login, $passwd) {
	if (!file_exists("../private"))
		mkdir("../private");
	$data = getUsers(USRFILE);
	if (key_exists($login, $data))
		return (1);
	$data[$login]['login'] = $login;
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	file_put_contents(USRFILE, serialize_($data));
	return (0);
}

function	getUsers() {
	return (unserialize_(file_get_contents(USRFILE)));
}

function	getCart() {
	if (isset($_SESSION['login']))
		return (unserialize_(file_get_contents(BASKETFILE))[$_SESSION['login']]);
	else
		return ($_SESSION['session_cart']);
}

function	getCartFull() {
	return (unserialize_(file_get_contents(BASKETFILE)));
}

function	getItems() {
	return (unserialize_(file_get_contents(ITEMFILE)));
}

function	addCartToDatabase($cart, $username) {
	echo "TODO: implement\n";

}

function	addToCart($itemname) {
	if (isset($_SESSION['login'])) {
		$username = $_SESSION['login'];
		$cart = getCartFull();
		$cart[$username][] = getItems()[$itemname];
		file_put_contents(BASKETFILE, serialize_($cart));
	}
	else {
		if (!isset($_SESSION['session_cart']))
			$_SESSION['session_cart'] = array();
		$_SESSION['session_cart'][] = getItems()[$itemname];
	}
}

function	getArchive() {
	return (unserialize_(file_get_contents(ARCHIVES)));
}

function	orderArchive() {
	if (isset($_SESSION['login'])) {
		$arch = getArchive();
		$cart = getCart();
		if (!empty($cart)) {
			$arch[] = array($_SESSION['login'], $cart);
			file_put_contents(ARCHIVES, serialize_($arch));
			orderDel();
		}
	}
	else
		echo "Please log in before placing order";
}

function	orderDel() {
	if (isset($_SESSION['login'])) {
		$cart = getCart();
		unset($cart[$_SESSION['login']]);
		file_put_contents(BASKETFILE, serialize_($cart));
	}
	else
		unset($_SESSION['session_cart']);
}
?>
