<?php
//    [PHP_AUTH_USER] => zaz
//    [PHP_AUTH_PW] => jaimelespetitsponeys
//    curl --user zaz:jaimelespetitsponeys http://eXrXpX.42.fr:8xxx/ex06/members_only.php

if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys') {
	header("Content-Type: image/png");
	echo "<html><body>\nHello Zaz<br />\n";
	echo "<img src='data:image/png;base64,";
	echo base64_encode(file_get_contents("../img/42.png"));
	echo "'>\n";
	echo "</body></html>\n";
}
else {
	header("WWW-Authenticate: Basic realm=''Member area''");
	header("HTTP/1.1 401 Unauthorized");
	echo "<html><body>That area is accessible for members only</body></html>\n";
}

?>
