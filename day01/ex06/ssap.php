#! /usr/bin/php
<?php
function    ft_split(&$str) {
    $str = explode(" ", preg_replace('/ +/', ' ', trim($str, " ")));
    sort($str);
    return ($str);
}

$boytable = array();
for ($i = 1; $i < $argc; ++$i) {
    $s = ft_split($argv[$i]);
    foreach($s as &$v)
        $boytable[$v] = $v;
}
sort($boytable);
foreach($boytable as $boy)
    echo $boy, "\n";
?>
