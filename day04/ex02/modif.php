<?php
function	auth($login, $passwd, $db) {
	$hashpw = hash("whirlpool", $passwd);
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

if (!($_POST['submit'] == "OK" && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])) {
	echo "ERROR\n";
	return ;
}
if (file_exists("../private/passwd"))
	$db = unserialize(file_get_contents("../private/passwd"));
else
	$db = array();
if (auth($_POST['login'], $_POST['oldpw'], $db)) {
	$db[$_POST['login']]['passwd'] = hash("whirlpool", $_POST['newpw']);
	file_put_contents("../private/passwd", serialize($db));
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
