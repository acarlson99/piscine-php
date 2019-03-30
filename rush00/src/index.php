<?php
include 'getdata.php';

session_start();





if ($_POST['submit'] == 'OK') {

	if ($_POST['login'] && $_POST['passwd']) {
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['passwd'] = $_POST['passwd'];
	}

}
if ($_SESSION['login'])
	$login_value = $_SESSION['login'];
if ($_SESSION['passwd'])
	$passwd_value = $_SESSION['passwd'];





if (isset($_SESSION['login']))
	echo "<div>WELCOME ", $_SESSION['login'], "</div>";
else
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="submit" value="signin" /></form>';

$items = getItems();
foreach ($items as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />", "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
	echo "<input type=\"submit\" name=\"submit\" value=\"", $item['name'], "\" />";
	echo "</form><br />";
}
$_SESSION['evaluate'] = 1;
?>
