#! /usr/bin/php
<?php
function	mod_title($contents, $start, $end) {
	if (($t_start = strpos($contents, "title=", $start)) !== FALSE && $t_start < $end) {
		$t_start += 6;
		if (($t_end = strpos($contents, "\"", $t_start + 1)) === FALSE)
			$t_end = strpos($contents, " ", $t_start + 1);
		$contents = substr_replace($contents, strtoupper(substr($contents, $t_start, $t_end - $t_start)), $t_start, $t_end - $t_start);
	}
	return ($contents);
}

function	mod_content($contents, $start, $end) {
	$c_start = strpos($contents, ">", $start + 1);
	$c_end = strpos($contents, "<", $c_start + 1);
	$contents = substr_replace($contents, strtoupper(substr($contents, $c_start, $c_end - $c_start)), $c_start, $c_end - $c_start);
	if ($c_end != $end)
		return (mod_content(mod_title($contents, $c_end, $end), $c_end, $end));
	return ($contents);
}

$contents = file_get_contents($argv[1]);
$start = 0;
while (($start = strpos($contents, "<a", $start)) !== FALSE)
{
	if (($end = strpos($contents, "</a>", $start)) === FALSE)
		break ;
	$contents = (mod_content(mod_title($contents, $start, $end), $start, $end));
	$start = $end + 1;
}
echo $contents;
?>
