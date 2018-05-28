#!/usr/bin/php
<?php
function upper_middle($match)
{
	return ($match[1].(strtoupper($match[2])).$match[3]);
}

function in_a_balise($find)
{
		$find[0] = preg_replace_callback("#(title=[ \t\n]*?)([\w]+)([ \t\n]*?>)#s", "upper_middle", $find[0]);
		$find[0] = preg_replace_callback("#(title=[ \t\n]*?[\"'])(.*?)([\"'])#s", "upper_middle", $find[0]);
		$find[0] = preg_replace_callback("#(>)(.*?)(<)#s", "upper_middle", $find[0]);
		return ($find[0]);
}

if ($argc > 1)
{
	$filename = $argv[1];
	if (file_exists($filename))
	{
		$line = file_get_contents($filename);
		$line = preg_replace_callback("#(<[aA] )(.*?)(</[aA]>)#s", "in_a_balise", $line);
		echo $line;
	}
}
?>
