<?php
function    ft_is_sort($arr) {
    for ($i = 1; $i < count($arr); ++$i) {
        if ($arr[$i - 1] > $arr[$i]) {
            return (0);
        }
    }
    return (1);
}
?>
