<?php
session_start();

if ($_GET['submit'] == 'OK') {

	if ($_GET['login'] && $_GET['passwd']) {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}

}
if ($_SESSION['login'])
	$login_value = $_SESSION['login'];
if ($_SESSION['passwd'])
	$passwd_value = $_SESSION['passwd'];
?>

<html><body>
<form action="index.php" name="index.php" method="get">
Username: <input type="text" name="login" value="<?php echo $login_value ?>" />
<br />
Password: <input type="password" name="passwd" value="<?php echo $passwd_value ?>" />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>
