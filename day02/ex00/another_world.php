#! /usr/bin/php
<?php
if ($argc < 2) {
	exit(1);
}
$s = preg_replace('/ +/', ' ', trim($argv[1], " "));
preg_replace('/\s+/', ' ', $s);
echo $s, "\n";
?>
