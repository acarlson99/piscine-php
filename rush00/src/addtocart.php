<?php
include 'getdata.php';

print_r($_POST);
echo "<br />";
print_r(getItems()[$_POST['submit']]);
?>
