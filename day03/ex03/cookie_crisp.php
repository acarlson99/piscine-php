<?php
// action, name, value
// set/get/del any any

// $> curl -c cook.txt 'http://eXrXpX.42.fr:8xxx/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'
// $> curl -b cook.txt 'http://eXrXpX.42.fr:8xxx/ex03/cookie_crisp.php?action=get&name=plat'
// choucroute
// $> curl -c cook.txt 'http://eXrXpX.42.fr:8xxx/ex03/cookie_crisp.php?action=del&name=plat'
// $> curl -b cook.txt 'http://eXrXpX.42.fr:8xxx/ex03/cookie_crisp.php?action=get&name=plat'
// $>

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
