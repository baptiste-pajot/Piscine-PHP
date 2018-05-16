#!/usr/bin/php
<?php
if ($argc > 1)
{
	$txt = $argv[1];
	$txt = preg_replace("/^[ \t]+/", "", $txt);
	$txt = preg_replace("/[ \t]+$/", "", $txt);
	$txt = preg_replace("/[ \t]+/", " ", $txt);
	echo $txt."\n";
}
?>
