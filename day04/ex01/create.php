<?php
function	getData($file) {
	if (file_exists("../private/passwd"))
		return (unserialize(file_get_contents("../private/passwd")));
	else
		return (array());
}

function	writeToFile($login, $passwd, $file) {
	if (!file_exists("../private")) {
		echo "DOING THING\n";
		mkdir("../private");
	}
	$data = getData($file);
	if ($data[$login])
		return (-1);
	$data[$login]['login'] = $login;
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	file_put_contents($file, serialize($data));
	return (0);
}

if ($_POST['submit'] == 'OK' && $_POST['login'] && $_POST['passwd']) {
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if ($login !== "" && !passwd !== "") {
		if (writeToFile($login, $passwd, "../private/passwd"))
			echo "ERROR\n";
		else
			echo "OK\n";
	}
	print_r(unserialize(file_get_contents("../private/passwd")));
}
?>
