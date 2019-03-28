#! /usr/bin/php
<?php
date_default_timezone_set('America/Los_Angeles');
$file = fopen("/var/run/utmpx", "r");
while ($b = fread($file, 628)) {
	$unpacked = unpack("a256uname/a4/a32tty/i/ival/I2time/a256/i16", $b);
	$arr[$unpacked['tty']] = $unpacked;
}
ksort($arr);
foreach ($arr as $v) {
	if ($v['val'] == 7) {
		echo str_pad(substr(trim($v['uname']), 0, 8), 8, " ");
		echo " ";
		echo str_pad(substr(trim($v['tty']), 0, 8), 8, " ");
		echo " ";
		echo date('M', $v['time1']);
		echo str_pad(date('j', $v['time1']), 3, " ", STR_PAD_LEFT);
		echo " ";
		echo date('H:i', $v['time1']);
		echo "\n";
	}
}
?>
