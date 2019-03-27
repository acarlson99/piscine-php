#! /usr/bin/php
<?php
if ($argc != 4) {
	echo "Incorrect Parameters\n";
	exit(1);
}

$a = intval(trim($argv[1], " \t"));
$b = intval(trim($argv[3], " \t"));
switch (trim($argv[2], " \t")) {
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
