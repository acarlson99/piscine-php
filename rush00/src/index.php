<?php
include 'getdata.php';

if (!isset($_SESSION))
	session_start();



#admin access check
if ($_POST['submit'] == 'admin')
{
	if ($_POST['submit'] == 'admin')
	{
		if ($_POST['login'] == 'admin' && $_POST['passwd'] == 'admin') {
			echo"Welcome, Lord\n";
			$_SESSION['login'] = 'admin';
			$_SESSION['passwd'] = 'admin';
			#adminPage();
		}
	}
}

if ($_POST['submit'] == 'signin' || $_POST['submit'] == 'signup')
{
	if ($_POST['submit'] == 'signin')
	{
		#fix error of signin accpeting blank fields
		if ($_POST['login'] && $_POST['passwd']) {
			if (authUsr($_POST['login'], $_POST['passwd'])) {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash("whirlpool", $_POST['passwd']);
			}
			else if (!isset($_POST['login']) || !isset($_POST['passwd']))
				echo "<div>LOGIN FAILED</div>\n";
		}
		else {
			$_POST['login'] = FALSE;
			$_POST['passwd'] = FALSE;
			$_SESSION['login'] = FALSE;
			$_SESSION['passwd'] = FALSE;
		}
	}
	#signup works :)
	else if ($_POST['submit'] == 'signup')
	{
		$db = getUsers();

		if (array_key_exists($_POST['login'])) {
			echo "OWO boy exists";
			$_POST['login'] = FALSE;
			$_POST['passwd'] = FALSE;
			$_SESSION['login'] = FALSE;
			$_SESSION['passwd'] = FALSE;
		}
		else {
			if (addUsr($_POST['login'], $_POST['passwd'])) {
				echo "LOGIN FAILED";
				$_POST['login'] = FALSE;
				$_POST['passwd'] = FALSE;
				$_SESSION['login'] = FALSE;
				$_SESSION['passwd'] = FALSE;
			}
			else {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash("whirlpool", $_POST['passwd']);
			}
		}
	}
	else {
		$_POST['login'] = FALSE;
		$_POST['passwd'] = FALSE;
		$_SESSION['login'] = FALSE;
		$_SESSION['passwd'] = FALSE;
	}
}

else if ($_POST['submit'] == 'signout') {
	unset($_SESSION['login']);
}
else if ($_POST['submit'] == 'DelOrder') {
	echo "DELETING ORDER\n";
	orderDel();
}
else if ($_POST['submit'] == 'SubmitOrder') {
	echo "ARCHIVING ORDER\n";
	orderArchive();
}
else if ($_POST['submit'] == 'set_results_filter') {
	if ($_POST['filter_results'] == '')
		unset($_SESSION['filter_results']);
	else
		$_SESSION['filter_results'] = $_POST['filter_results'];
}





if (isset($_SESSION['login'])) {
	echo "<div>WELCOME ", $_SESSION['login'], "</div>";
	echo '<form action="index.php" name="signout.php" method="post"><input type="submit" name="submit" value="signout" /></form>';
}
else {
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="submit" value="signin" /></form>';
	echo '<form action="signup.php" name="signup.php" method="post"><input type="submit" name="submit" value="signup" /></form>';
}

echo '<form action="index.php" name="index.php" method="post">Filter: <input type="text" name="filter_results"><input type="submit" name="submit" value="set_results_filter" /></form>';

$items = getItems();
foreach ($items as $item) {
	if (isset($_SESSION['filter_results']) && in_array($_SESSION['filter_results'], $item['tags']) || !isset($_SESSION['filter_results'])) {
		echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />", "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
		echo "<input type=\"submit\" name=\"submit\" value=\"", $item['name'], "\" />";
		echo "</form><br />";
	}
}
$_SESSION['evaluate'] = 1;
?>
