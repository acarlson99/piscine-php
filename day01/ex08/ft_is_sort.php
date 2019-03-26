<?php
function    ft_is_sort($arr) {
    for ($i = 1; $i < count($arr); ++$i) {
        if ($arr[$i - 1] > $arr[$i]) {
            return (0);
        }
    }
    return (1);
}

// $tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
// if (ft_is_sort($tab))
//     echo "The array is sorted\n";
// else
//     echo "The array is not sorted\n";

// $tab[] = "What are we doing now ?";
// if (ft_is_sort($tab))
//     echo "The array is sorted\n";
// else
//     echo "The array is not sorted\n";

// $tab = array(1, 2, 2, 4, 7, 8);
// if (ft_is_sort($tab))
//     echo "The array is sorted\n";
// else
//     echo "The array is not sorted\n";
?>
