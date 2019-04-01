<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="icon" type="image/png" href="../favicon.ico">
<?php
include 'getdata.php';

if (!isset($_SESSION))
	session_start();

echo "<br />";
if ($_SESSION['evaluate'] && $_POST['submit'] !== "view_cart") {
	addToCart($_POST['submit']);
	$_SESSION['evaluate'] = 0;
}
else
	unset($_POST['view_cart']);
echo "CART:<br />";
$cart = getCart();
$total = 0;
foreach ($cart as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />";
	$total += $item['price'];
}
echo '<br />$', $total;
?>
<form action="index.php" name="index.php" method="post">
<input type="submit" name="submit" value="Back to shopping" />
</form>

<form action="index.php" name="index.php" method="post">
<input type="submit" name="submit" value="DelOrder" />
</form>

<form action="index.php" name="index.php" method="post">
<input type="submit" name="submit" value="SubmitOrder" />
</form>
