<?php
include 'getdata.php';

session_start();

echo "<br />";
if ($_SESSION['evaluate']) {
	addToCart($_POST['submit']);
	$_SESSION['evaluate'] = 0;
}
echo "CART:<br />";
$cart = getCart();
$total = 0;
foreach ($cart as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />";
	$total += $item['price'];
}
echo '<br />$', $total;
// NOTE: archive order
// NOTE: modify basket
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
