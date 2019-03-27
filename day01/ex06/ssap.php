#! /usr/bin/php
<?php
function    ft_split(&$str) {
    $str = explode(" ", preg_replace('/ +/', ' ', trim($str, " ")));
    sort($str);
    return ($str);
}

$boytable = array();
$boynum = 0;
for ($i = 1; $i < $argc; ++$i) {
	$s = ft_split($argv[$i]);
	foreach($s as &$v) {
		$boytable[$boynum] = $v;
		++$boynum;
	}
}
sort($boytable);
foreach($boytable as $boy)
    echo $boy, "\n";
?>
