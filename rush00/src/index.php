<?php
include 'getdata.php';

$items = getItems();
foreach ($items as $item) {
	echo $item['name'], ": $", $item['price'], "<img src='", $item['img'], "'width=25%><br />", "<form action=\"addtocart.php\" name=\"addtocart.php\" method=\"post\" >";
	echo "<input type=\"submit\" name=\"submit\" value=\"", $item['name'], "\" />";
	echo "</form><br />";
}
?>
