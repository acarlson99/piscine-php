<?php
// $> curl 'http://eXrXpX.42.fr:8xxx/ex02/print_get.php?login=mmontinet'
// login: mmontinet
// $> curl 'http://eXrXpX.42.fr:8xxx/ex02/print_get.php?gdb=pied2biche&barry=barreamine'
// gdb: pied2biche
// barry: barreamine
// $>

foreach ($_GET as $key => $val) {
	echo $key, ": ", $val, "\n";
}
?>
