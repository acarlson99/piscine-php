#! /usr/bin/php
<?php
if ($argc <= 2)
	exit(1);

for ($i = 2; $i < $argc; ++$i) {
	if (preg_match('/.+:.+/', $argv[$i])) {
		list($key, $value) = explode(':', $argv[$i]);
		$array[$key] = $value;
	}
}
if (array_key_exists($argv[1], $array))
	echo $array[$argv[1]], "\n";
?>
