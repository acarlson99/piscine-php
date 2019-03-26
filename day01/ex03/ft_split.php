<?php
function    ft_split($str) {
    $str = explode(" ", preg_replace('/ +/', ' ', trim($str, " ")));
    sort($str);
    return ($str);
}
?>
