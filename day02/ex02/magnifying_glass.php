#! /usr/bin/php
<?php
function	fuckmeupdawg($string) {
	preg_match("/(?:(.*?)(?:(title=\")([^\"]*?)(\")).*?)/", $string, $re);
	print_r($re);
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
		fuckmeupdawg(substr($contents, $start, $end - $start));
		$start = strpos($contents, "<a", $end);
		if ($start === FALSE)
			break ;
		echo substr($contents, $end, $start - $end);
	}
	echo substr($contents, $end);
}
?>
