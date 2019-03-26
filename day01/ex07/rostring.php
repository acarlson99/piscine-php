#! /usr/bin/php
<?php
function    ft_split(&$str) {
    return (explode(" ", preg_replace('/ +/', ' ', trim($str, " "))));
}

if ($argc < 2) {
    exit(0);
}

$s = $argv[1];
$a = ft_split($s);
for ($i = 1; $i < count($a); ++$i)
    echo $a[$i], " ";
echo $a[0], "\n";
?>
