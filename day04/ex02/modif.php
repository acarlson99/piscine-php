<?php
function	auth($login, $passwd, $db) {
	$hashpw = hash("whirlpool", $passwd);
	foreach($db as $key => $val) {
		if ($key == $login) {
			if ($val['passwd'] == $hashpw && $val['login'] == $login)
				return (TRUE);
			else
				return (FALSE);
		}
	}
	return (FALSE);
}

if (file_exists("../private/passwd"))
	$db = unserialize(file_get_contents("../private/passwd"));
else
	return (FALSE);

?>
