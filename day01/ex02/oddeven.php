#! /usr/bin/php
<?php
echo "Enter a number: ";
while ($f = fgets(STDIN)) {
    $f = rtrim($f, "\n");
    if (preg_match('/^-?[0-9]+$/', $f)) {
        $num = intval($f);
        echo "The number $num ";
        if ($num % 2)
            echo "is odd";
        else
            echo "is even";
        echo "\n";
    }
    else
        echo "'$f' is not a number\n";
    echo "Enter a number: ";
}
echo "^D\n";
?>
