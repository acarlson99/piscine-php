#! /usr/bin/php
<?php
if ($argc != 2) {
	echo "Incorrect Parameters\n";
	exit(1);
}

if (preg_match('//', $argv[1], $re)) {
}
	
$a = intval($re[0]);
$b = intval($re[2]);
switch ($re[1]) {
case '+':
	printf("%d\n", $a + $b);
	break;
case '-':
	printf("%d\n", $a - $b);
	break;
case '/':
	printf("%d\n", $a / $b);
	break;
case '*':
	printf("%d\n", $a * $b);
	break;
case '%':
	printf("%d\n", $a % $b);
	break;
}
?>
