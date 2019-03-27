#! /usr/bin/php
<?php
function	ft_split($str)
{
	$str = explode(" ", preg_replace('/ +/', ' ', trim($str, " ")));
	sort($str);
	return ($str);
}

function	ischar($c)
{
	return (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z'));
}

function	isdigit($c)
{
	return ($c >= '0' && $c <= '9');
}

function	rfturn($l, $v)
{
	printf("%d LINE %d\n", $v, $l);
	return ($v);
}

function	assign_type($c)
{
	if (ischar($c))
		return (0);
	else if (isdigit($c))
		return (1);
	else
		return (2);
}

function	cmp($s1, $s2)
{
	$i = 0;
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);
	while ($i < count($s1) && $i < count($s2) && $s1[$i] === $s2[$i])
		++$i;
	$s1t = assign_type($s1[$i]);
	$s2t = assign_type($s2[$i]);
	if ($s1t != $s2t)
		return ($s1t < $s2t ? -1 : 1);
	else
		return ($s1[$i] < $s2[$i] ? -1 : 1);
}

$boytable = array();
for ($i = 1; $i < $argc; ++$i)
{
	$s = ft_split($argv[$i]);
	foreach($s as &$v)
		$boytable[$v] = $v;
}
usort($boytable, "cmp");
print_r($boytable);

/*
  char
  number
  other
*/
?>
