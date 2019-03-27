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

function	cmp($s1, $s2)
{
	$i = 0;
	while ($i < count($s1) && $i < count($s2) && $s1[$i] === $s2[$i])
		++$i;
	if ($i === count($s1) || $i === count($s2))
		return (count($s1) < count($s2) ? -1 : 1);
	else if (ischar($s1[$i]))
	{
		echo "CHAR_CMP ";
		echo "$s1 < $s2  -  ";
		echo "$s1[$i] < $s2[$i] ";
		$s1 = strtolower($s1);
		if (ischar($s2[$i]))
		{
			$s2 = strtolower($s2);
			return (rfturn(__LINE__, $s1[$i] < $s2[$i] ? 1 : -1));
		}
		return (rfturn(__LINE__, 1));
	}
	else if (isdigit($s1[$i]))
	{
		echo "DIG_CMP ";
		echo "$s1 < $s2  -  ";
		echo "$s1[$i] < $s2[$i] ";
		if (isdigit($s2[$i]))
		{
			return (rfturn(__LINE__, $s1[$i] < $s2[$i] ? 1 : -1));
		}
		else if (ischar($s2[$i]))
		{
			return (rfturn(__LINE__, -1));
		}
		else
		{
			return (rfturn(__LINE__, 1));
		}
	}
	else
	{
		echo "OTHER_CMP ";
		echo "$s1 < $s2  -  ";
		echo "$s1[$i] < $s2[$i] ";
		if (!ischar($s1[$i]) && !isdigit($s1[$i]))
		{
			return (rfturn(__LINE__, 1));
		}
		return (rfturn(__LINE__, $s1[$i] < $s2[$i] ? 1 : -1));
	}
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
