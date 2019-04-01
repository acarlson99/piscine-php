<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="icon" type="image/png" href="../favicon.ico">
<?php
include 'getdata.php';
if (!isset($_SESSION))
	session_start();

echo "<h1>WELCOME TO THE STORE", "</h1>";

$check = 0;

if ($_POST['submit'] == 'signin' || $_POST['submit'] == 'signup')
{
	if ($_POST['submit'] == 'signin')
	{
		if ($_POST['login'] == 'admin' && $_POST['passwd'] == 'admin') {
			$check = 1;
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
			echo "Field cant be empty";
			unset($_POST['login']);
			unset($_POST['passwd']);
			unset($_SESSION['login']);
			unset($_SESSION['passwd']);
		}
	}

	else if ($_POST['submit'] == 'signup')
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
	echo "Prepare for the apples\n";
	orderArchive();
}
else if ($_POST['submit'] == 'set_results_filter') {
	if ($_POST['filter_results'] == '')
		unset($_SESSION['filter_results']);
	else
		$_SESSION['filter_results'] = $_POST['filter_results'];
}

else if ($_POST['submit'] == 'delete-users') {
	echo "Goodybye user database :)";
	userDel();
	unset($_SESSION['login']);
	unset($_SESSION['passwd']);
}

else if ($_POST['submit'] == 'delete-orders') {
	echo "Deleted all orders :)";
	itemDel();
}

else if ($_POST['submit'] == 'add-peach') {
	echo "Added Peach to Shop :)";
	addPeach();
}

else if ($_POST['submit'] == 'del-peach') {
	echo "Deleted Extra Items from Shop :)";
	delPeach();
}

else if ($_POST['submit'] == 'admin-add') {
	echo "Create a new account ADMIN ONLY :)";
	adminAddUser();
}

if (isset($_SESSION['login'])) {
	echo "<div>LOGGED IN AS ", $_SESSION['login'], "</div>";
	echo '<form action="index.php" name="signout.php" method="post"><input type="submit" name="submit" value="signout" /></form>';
}

if ($check == 1){
	echo"Hello Workspace Admin :) </br>";
	$usr = getUsers();
 	echo '<form action="index.php" name="index.php" method="post"><input type="submit" name="submit" value="delete-users" /></form>';
	echo '<form action="index.php" name="index.php" method="post"><input type="submit" name="submit" value="delete-orders" /></form>';
	echo '<form action="index.php" name="index.php" method="post"><input type="submit" name="submit" value="add-peach" /></form>';
	echo '<form action="index.php" name="index.php" method="post"><input type="submit" name="submit" value="del-peach" /></form>';
	echo '<form action="signup.php" name="signup.php" method="post"><input type="submit" name="submit" value="admin-add" /></form>';
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
		echo "<center><div class=\"product\">";
		echo $item['name'], ": $", $item['price'], "<br />";
		echo "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
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
