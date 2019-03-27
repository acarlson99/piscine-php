#! /usr/bin/php
<?php
function	ft_split(&$str) {
	$str = explode(" ", preg_replace('/ +/', ' ', trim($str, " ")));
	sort($str);
	return ($str);
}

function	ischar(&$c) {
	return ((c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z'));
}

function	isdigit(&$c) {
	return (c >= '0' && c <= '9');
}

function	comp_two(&$s1, &$s2) {
}

function	cmp($s1, $s2) {
	$s1 = tolower($s1);
	$s2 = tolower($s2);
}

$boytable = array();
for ($i = 1; $i < $argc; ++$i) {
	$s = ft_split($argv[$i]);
	foreach($s as &$v)
		$boytable[$v] = $v;
}
?>


/*
  char
  number
  other
*/
