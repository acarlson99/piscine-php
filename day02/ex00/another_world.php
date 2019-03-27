#! /usr/bin/php
<?php
if ($argc < 2) {
	exit(1);
}
$s = preg_replace('/[ \t]+/', ' ', trim($argv[1], " \t"));
echo $s, "\n";
?>
