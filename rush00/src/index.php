<?php
$items = unserialize(file_get_contents("../private/items"));
foreach ($items as $item) {
	echo $item['name'], $item['price'], "<img src='", $item['img'], "'width=25%><br />";
}
?>
