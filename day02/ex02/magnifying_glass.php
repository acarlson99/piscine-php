#! /usr/bin/php
<?php
function	heccmeupdawg($string) {
	$s = "";
	while (preg_match_all("/(?:(<[^>]*?title=\")([^\"]*?)(\")([^>]*>?))/s", $string, $re)) {
		print_r($re);
		$i = 1;
		$idx_num = 0;
		while ($i < count($re)) {
			$s .= $re[$i];
			++$i;
			$s .= strtoupper($re[$i]);
			++$i;
			$s .= $re[$i];
			++$i;
			$s .= $re[$i];
			++$i;
		}
	}
	// var_dump($s);
	if (preg_match_all("/(?:>([^<]*?)<)+/s", $s, $re)) {
		print_r($re);
		$i = 0;
		while ($i < count($re)) {
			$s .= ">" . strtoupper($re[1]) . "<";
			++$i;
		}
	}
	if ($s === "")
		echo ($string);
	else
		echo $s;
}

for ($argnum = 1; $argnum < $argc; ++$argnum) {
	$contents = file_get_contents($argv[$argnum]);
	$b = strlen($contents);
	$start = strpos($contents, "<a");
	$end = 0;
	echo substr($contents, $end, $start);
	if ($start === FALSE)
		continue ;
	while ($start < $b)
	{
		if ($start === FALSE)
			break ;
		$end = strpos($contents, "</a>", $start);
		if ($end === FALSE)
			break ;
		heccmeupdawg(substr($contents, $start, $end - $start));
		$start = strpos($contents, "<a", $end);
		if ($start === FALSE)
			break ;
		echo substr($contents, $end, $start - $end);
	}
	echo substr($contents, $end);
}
?>
