<?php
include 'getdata.php';

session_start();

echo "<br />";
if ($_SESSION['evaluate']) {
	addToCart($_POST['submit']);
	$_SESSION['evaluate'] = 0;
}
echo "CART:<br />";
foreach (getCart() as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />";
}
?>
<form action="index.php" name="index.php" method="post">
<input type="submit" name="submit" value="Back to shopping" />
</form>
