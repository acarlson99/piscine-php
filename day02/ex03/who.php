#! /usr/bin/php
<?php
date_default_timezone_set('America/Los_Angeles');
$file = fopen("/var/run/utmpx", "r");
while ($bytes = fread($file, 628)) {
	$unpacked = unpack("a256uname/a4/a32tty/i/ival/I2time/a256/i16", $bytes);
	$arr[$unpacked['tty']] = $unpacked;
}
sort($arr);
foreach ($arr as $val) {
	if ($val['val'] == 7) {
		echo str_pad(substr(trim($val['uname']), 0, 8), 8);
		echo " ";
		echo str_pad(substr(trim($val['tty']), 0, 8), 8);
		echo " ";
		echo date('M', $val['time1']);
		echo str_pad(date('j', $val['time1']), 3, " ", STR_PAD_LEFT);
		echo " ";
		echo date('H:i', $val['time1']);
		echo " \n";
	}
}
?>
