#! /usr/bin/php
<?php
if ($argc != 2) {
	echo "Incorrect Parameters\n";
	exit(1);
}

if (!preg_match('/^\s*(-?\d+)\s*([\-\+%\*\/])\s*(-?\d+)\s*$/', $argv[1], $re)) {
	echo "Syntax Error\n";
	exit(1);
}

$a = intval($re[1]);
$b = intval($re[3]);
switch ($re[2]) {
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
