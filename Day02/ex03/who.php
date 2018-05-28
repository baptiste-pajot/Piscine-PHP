#!/usr/bin/php
<?php

$utmp = "/var/run/utmpx";
if (file_exists($utmp))
{
	$txt = file_get_contents($utmp);
	$range = 628;
	$txt = substr($txt, 2*$range);
	date_default_timezone_set("Europe/Paris");
	$i =  0;
	while ($txt != "")
	{
		$full_tab = unpack("A256user/A4id/A32tty/ipid/itype/ltimeval_sec/ltimeval_microsec/A256host/Aq64pad", $txt);
		if ($full_tab["type"] == 7)
		{
			//print_r($full_tab);
			$final_tab[$i]["user"] = $full_tab["user"];
			$final_tab[$i]["tty"] = $full_tab["tty"];
			$final_tab[$i]["date"] = date("M j H:i ",  $full_tab["timeval_sec"]);
			$i++;
		}
		$txt = substr($txt, $range);
	}
	sort($final_tab);
	foreach ($final_tab as $elem)
		echo $elem["user"]."   ".$elem["tty"]."  ".$elem["date"]."\n";
}
?>
