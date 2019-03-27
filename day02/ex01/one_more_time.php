#! /usr/bin/php
<?php

function	wrong_format() {
	echo "Wrong Format\n";
}

function	ft_split($str) {
	return (explode(" ", preg_replace('/ +/', ' ', trim($str, " "))));
}

$weekdays = array(
	0 => "/^[Ll]undi$/",
	1 => "/^[Mm]ardi$/",
	2 => "/^[Mm]ercredi$/",
	3 => "/^[Jj]eudi$/",
	4 => "/^[Vv]endredi$/",
	5 => "/^[Ss]amedi$/",
	6 => "/^[Dd]imanche$/",
);

$days_english = array(
	0 => "Mon",
	1 => "Tue",
	2 => "Wed",
	3 => "Thurs",
	4 => "Fri",
	5 => "Sat",
	6 => "Sun",
);

$months = array(
	1 => "/^[Jj]anvier$/",
	2 => "/^[Ff][eé]vrier$/",
	3 => "/^[Mm]ars$/",
	4 => "/^[Aa]vril$/",
	5 => "/^[Mm]ai$/",
	6 => "/^[Jj]uin$/",
	7 => "/^[Jj]uillet$/",
	8 => "/^[Aa]out$/",
	9 => "/^[Ss]eptembre$/",
	10 => "/^[Oo]ctobre$/",
	11 => "/^[Nn]ovembre$/",
	12 => "/^[Dd][eé]cembre$/",
);

if ($argc != 2) {
	exit(1);
}

if (!preg_match('/^\w+ [0-2]?\d \w+ \d+ [0-6]\d:[0-6]\d:[0-6]\d$/', $argv[1])) {
	wrong_format();
	exit(1);
}

$args = ft_split($argv[1]);

$wday = 0;
while ($wday < count($weekdays) && !preg_match($weekdays[$wday], $args[0]))
	++$wday;
if ($wday >= count($weekdays)) {
	wrong_format();
	exit(1);
}

$day = $args[1];

$mon = 1;
while ($mon < count($months) && !preg_match($months[$mon], $args[2]))
	++$mon;
if ($mon >= count($months)) {
	wrong_format();
	exit(1);
}

$year = $args[3];
$time = $args[4];

// echo 'wday ', $wday, "\n";
// echo 'day ', $day, "\n";
// echo 'mon ', $mon, "\n";
// echo 'year ', $year, "\n";
// echo 'time ', $time, "\n";

date_default_timezone_set('Europe/Paris');

$total = $year . "-" . $mon . "-" . $day . " " . $days_english[$wday] . " " . $time;
if (($date = strtotime($total)) === FALSE) {
	echo "give the good time\n";
	exit(1);
}
echo "$date", "\n";

// echo "$total\n";
// $date = date_create_from_format('Y-m-d D H:i:s', $total);
// echo $date->format('Y-m-d D H:i:s'), "\n";
// echo $date->format('U'), "\n";

// TODO: error check datetime

?>
