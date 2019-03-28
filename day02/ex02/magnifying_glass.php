#! /usr/bin/php
<?php
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
		$old_start = $start;
		$end = strpos($contents, "</a>", $start);
		if ($end === FALSE)
			break ;
		echo "-", substr($contents, $start, $end - $start), "\n\n";
		$start = strpos($contents, "<a", $end);
		if ($end === FALSE)
			break ;
		echo "2", substr($contents, $end, $start), "/2";
	}
	echo substr($contents, $end);
}
?>
