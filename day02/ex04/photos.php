#! /usr/bin/php
<?php
function	replace_silly($name) {
	return (preg_replace("/\//", "!", $name));
}

function	fix_filename($hostname, $newfilename) {
	return (preg_replace('/\/?\\.[^.\\s]{3,4}$/', '', $hostname) . "/" . $newfilename);
}

function	save_img($filename, $dirname, $hostname) {
	if ($filename == "")
		return ;
	$newfilename = replace_silly($filename);
	if ($newfilename[0] === '.') {
		$newfilename = fix_filename($hostname, $newfilename);
	}
	$fn = $dirname . "/" . $newfilename;
	file_put_contents($fn, file_get_contents($filename));
	echo "FOUND IMAGE $filename\n";
}

$c = curl_init();
curl_setopt($c, CURLOPT_URL, $argv[1]);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

if (($raw = curl_exec($c)) === FALSE) {
	echo "CURL ERROR\n";
	exit(1);
}
preg_match_all("/<img .*?src=\"([^\"]*?)\".*?>/s", $raw, $re);
$nicename = trim($argv[1], "/");
$dirname = "./" . replace_silly($nicename);
if (mkdir($dirname, 0777, true) === FALSE) {
	echo "Error making directory.  Aborting\n";
	exit(1);
}
foreach ($re as $key => $matchgroup) {
	if ($key == 0)
		continue ;
	foreach ($matchgroup as $filename) {
		save_img($filename, $dirname, $nicename);
	}
}
?>
