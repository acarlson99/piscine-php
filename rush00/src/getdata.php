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
	if (!preg_match('/^\w{5,}$/', $login)) {
		echo "BAD USERNAME";
		return (1);
	}
	if (!preg_match('/^\w{5,}$/', $passwd)) {
		echo "BAD PASSWD";
		return (1);
	}
	if (key_exists($login, $data))
		return (1);
	$data[$login]['login'] = $login;
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	file_put_contents(USRFILE, serialize_($data));
	return (0);
}

function	getUsers() {
	if (file_exists(USRFILE))
		return (unserialize_(file_get_contents(USRFILE)));
	else
		return (array());
}

function	getCart() {
	if (isset($_SESSION['login'])) {
		if (file_exists(BASKETFILE))
			return (unserialize_(file_get_contents(BASKETFILE))[$_SESSION['login']]);
		else
			return (array());
	}
	else
		return ($_SESSION['session_cart']);
}

function	getCartFull() {
	if (file_exists(BASKETFILE))
		return (unserialize_(file_get_contents(BASKETFILE)));
	else
		return (array());
}

function	getItems() {
	if (file_exists(ITEMFILE))
		return (unserialize_(file_get_contents(ITEMFILE)));
	else {
		echo "But what if you ran ./install.php, dickass<br />";
		return (array());
	}
}

function	addCartToDatabase() {
	if (isset($_SESSION['session_cart'])) {
		foreach ($_SESSION['session_cart'] as $item) {
			addToCart($item['name']);
		}
		unset($_SESSION['session_cart']);
	}
}

function	addToCart($itemname) {
	if (isset($_SESSION['login'])) {
		$username = $_SESSION['login'];
		$cart = getCartFull();
		if (!isset($cart[$username]))
			$cart[$username] = array();
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
	if (file_exists(ARCHIVES))
		return (unserialize_(file_get_contents(ARCHIVES)));
	else
		return (array());
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
#need to edit list of user, if exist able to del
function	adminDel() {
	#to delete user if exists in file, read then unset if it is valid
	if (isset($_SESSION['login'])) {
		$user = getUsers();
		echo "$user";
		if ($_POST[$login] == $user)
		{
			unset($user[$_SESSION['login']]);
			file_put_contents(USRFILE, serialize_($user));
		}
		#create button like login, to delete selected username printed from list
	}
}
#admin function to manipulate archived orders, to look for all users, and to delete order
function	adminArchive() {
	if (isset($_SESSION['login'])) {
		#get list of users
		$user = getUsers();
		echo "$user";
		$arch = getArchive();
		#open archive folder, with users who have an order open already
/* 		if ($_POST[$login] == $arch) {
		} */
	}
}

?>
