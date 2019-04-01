<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="icon" type="image/png" href="../favicon.ico">
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
			echo"Welcome back Admin\n";
			adminPage();
		}
	}
}
$check = 0;
if ($_POST['submit'] == 'signin' || $_POST['submit'] == 'signup')
{
	if ($_POST['submit'] == 'signin')
	{
		if ($_POST['login'] == 'admin' && $_POST['passwd'] == 'admin') {
			echo"Test Admin\n";
			$check = 1;
			echo "$check";
		}
		if ($_POST['login'] && $_POST['passwd']) {
			if (authUsr($_POST['login'], $_POST['passwd'])) {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash("whirlpool", $_POST['passwd']);
			}
			else if (!isset($_POST['login']) || !isset($_POST['passwd']))
				echo "<div>LOGIN FAILED</div>\n";
		}
		else {
			unset($_POST['login']);
			unset($_POST['passwd']);
			unset($_SESSION['login']);
			unset($_SESSION['passwd']);
		}
	}

	else if ($_POST['submit'] == 'signup')	// NOTE: signup is broken as hell
	{
		$db = getUsers();

		if (array_key_exists($_POST['login'], $db)) {
			echo "OWO boy exists";
			unset($_POST['login']);
			unset($_POST['passwd']);
			unset($_SESSION['login']);
			unset($_SESSION['passwd']);
		}
		else {
			if (addUsr($_POST['login'], $_POST['passwd'])) {
				echo "LOGIN FAILED";
				unset($_POST['login']);
				unset($_POST['passwd']);
				unset($_SESSION['login']);
				unset($_SESSION['passwd']);
			}
			else {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash("whirlpool", $_POST['passwd']);
				addCartToDatabase();
			}
		}
	}
	else {
		unset($_POST['login']);
		unset($_POST['passwd']);
		unset($_SESSION['login']);
		unset($_SESSION['passwd']);
	}
}

else if ($_POST['submit'] == 'signout') {
	unset($_SESSION['login']);
	unset($_SESSION['session_cart']);
}
else if ($_POST['submit'] == 'DelOrder') {
	echo "DELETING ORDER\n";
	orderDel();
}
else if ($_POST['submit'] == 'SubmitOrder') {
	echo "Prepare to be appled\n";
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

#check used for admin access
if ($check == 1){
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="delete" value="delete user" /></form>';
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="delete" value="delete order" /></form>';

}

#when user signs out
else {
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="submit" value="signin" /></form>';
	echo '<form action="signup.php" name="signup.php" method="post"><input type="submit" name="submit" value="signup" /></form>';
}
echo '<form action="index.php" name="index.php" method="post">Filter: <input type="text" name="filter_results"><input type="submit" name="submit" value="set_results_filter" /></form>';

$items = getItems();
foreach ($items as $item) {
	if (isset($_SESSION['filter_results']) && in_array($_SESSION['filter_results'], $item['tags']) || !isset($_SESSION['filter_results'])) {
		echo "<center><div class=\"product\">";
		echo "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
		echo $item['name'], ": $", $item['price'], "<br />";
		echo "<input type=\"submit\" class=\"submitButton\" name=\"submit\" value=\"", $item['name'], "\" /><br />";
		echo "<img src='", $item['img'], "' class=\"productImage\" width=25%><br />";
		echo "</form><br />";
		echo "</div></center>";
		echo "<hr>";
	}
}

echo "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
echo "<input type=\"submit\" name=\"submit\" value=\"view_cart\" />";
echo "</form><br />";
$_SESSION['evaluate'] = 1;
?>
