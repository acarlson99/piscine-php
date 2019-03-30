<?php
include 'getdata.php';

session_start();





if ($_POST['submit'] == 'signin' || $_POST['submit'] == 'signup') {
	if ($_POST['submit'] == 'signin') {


		if ($_POST['login'] && $_POST['passwd']) {
			if (authUsr($_POST['login'], $_POST['passwd'])) {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash("whirlpool", $_POST['passwd']);
			}
			else
				echo "<div>LOGIN FAILED</div>\n";
		}
		else {
			$_POST['login'] = FALSE;
			$_POST['passwd'] = FALSE;
			$_SESSION['login'] = FALSE;
			$_SESSION['passwd'] = FALSE;
		}
	}
	else if ($_POST['submit'] == 'signup') {

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





if (isset($_SESSION['login'])) {
	echo "<div>WELCOME ", $_SESSION['login'], "</div>";
	echo '<form action="index.php" name="signout.php" method="post"><input type="submit" name="submit" value="signout" /></form>';
}
else {
	echo '<form action="signin.php" name="signin.php" method="post"><input type="submit" name="submit" value="signin" /></form>';
	echo '<form action="signup.php" name="signup.php" method="post"><input type="submit" name="submit" value="signup" /></form>';
}

$items = getItems();
foreach ($items as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />", "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
	echo "<input type=\"submit\" name=\"submit\" value=\"", $item['name'], "\" />";
	echo "</form><br />";
}
$_SESSION['evaluate'] = 1;
?>
