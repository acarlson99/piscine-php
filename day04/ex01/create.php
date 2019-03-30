<?php
function	writeToFile($login, $passwd, $file) {
	if (!file_exists("../private")) {
		echo "DOING THING\n";
		mkdir("../private");
	}
	if (file_exists("../private/passwd"))
		$data = unserialize(file_get_contents("../private/passwd"));
	else
		$data = array();
	$data[$login]['login'] = $login;
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	file_put_contents($file, serialize($data));
}

if ($_POST['submit'] == 'OK' && $_POST['login'] && $_POST['passwd']) {

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	writeToFile($login, $passwd, "../private/passwd");
	print_r(unserialize(file_get_contents("../private/passwd")));
}
?>
