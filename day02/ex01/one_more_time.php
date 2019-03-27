#! /usr/bin/php
<?php
$weekdays = array(
	0 => 'fuck this',
);

$months = array(
	0 => "/^[Jj]anvier$/",
	1 => "/^[Ff][eé]vrier$/",
	2 => "/^[Mm]ars$/",
	3 => "/^[Aa]vril$/",
	4 => "/^[Mm]ai$/",
	5 => "/^[Jj]uin$/",
	6 => "/^[Jj]uillet$/",
	7 => "/^[Aa]out$/",
	8 => "/^[Ss]eptembre$/",
	9 => "/^[Oo]ctobre$/",
	10 => "/^[Nn]ovembre$/",
	11 => "/^[Dd][eé]cembre$/",
);
$i = 0;
while ($i < count($months) && !preg_match($months[$i], $argv[1]))
	++$i;
echo $i, "\n";
?>
