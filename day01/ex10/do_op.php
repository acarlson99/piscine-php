#! /usr/bin/php
<?php
if ($argc != 4) {
	echo "Incorrect Parameters\n";
	exit(1);
}

$a = intval($argv[1]);
$b = intval($argv[3]);
switch ($argv[2]) {
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
