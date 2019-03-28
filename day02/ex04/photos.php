#! /usr/bin/php
<?php
function	replace_silly($name) {
	return (preg_replace("/\//", "!", $name));
}

function	save_img($filename, $dirname, $nicename) {
	echo "CALLED ON $filename\n";
	if ($filename == "")
		return ;
	$newfilename = replace_silly($filename);
	$fn = $dirname . "/" . $newfilename;
	file_put_contents($fn, file_get_contents($filename));
	echo "$filename\n";
}

$c = curl_init();
curl_setopt($c, CURLOPT_URL, $argv[1]);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

if (($raw = curl_exec($c)) === FALSE) {
	echo "CURL ERROR\n";
	exit(1);
}
echo $raw;
preg_match_all("/<img .*?src=\"([^\"]*?)\".*?>/s", $raw, $re);
$nicename = trim($argv[1], "/");
$dirname = "./" . replace_silly($nicename);
if (mkdir($dirname, 0777, true) === FALSE) {
	echo "Error making directory.  Aborting\n";
	exit(1);
}
print_r($re);
foreach ($re as $key => $matchgroup) {
	if ($key == 0)
		continue ;
	foreach ($matchgroup as $filename) {
		save_img($filename, $dirname, $nicename);
	}
}
?>
