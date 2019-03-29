<?php
// action, name, value
// set/get/del any any
switch ($_GET['action']) {
case "set":
	setcookie($_GET['name'], $_GET['value']);
	break ;
case "get":
	if ($_COOKIE[$_GET['name']])
		echo $_COOKIE[$_GET['name']], "\n";
	break;
case "del":
	setcookie($_GET['name'], NULL, time() - 1);
	break;
}
?>
