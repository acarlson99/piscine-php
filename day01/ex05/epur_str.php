#! /usr/bin/php
<?php
if ($argc != 2) {
    exit(1);
}
echo preg_replace('/ +/', ' ', trim($argv[1], " ")), "\n";
?>
