#!/usr/bin/php
<?php
if ($argc > 1)
{
	$txt1 = explode(" ", $argv[1]);
	if (count($txt1) != 5)
	{
		echo "Wrong Fromat\n";
		return ;
	}
	//print_r($txt1);
	$txt2 = explode(":", $txt1[4]);
	if (count($txt2) != 3)
	{
		echo "Wrong Fromat\n";
		return ;
	}
	//print_r($txt2);
	$day_name = $txt1[0];
	$day_number = $txt1[1];
	$month = $txt1[2];
	$year = $txt1[3];
	$hour = $txt2[0];
	$min = $txt2[1];
	$sec = $txt2[2];

if (!preg_match("/^[Ll]undi$/", $day_name) && !preg_match("/^[Mm]ardi$/", $day_name) && !preg_match("/^[Mm]ercredi$/", $day_name) && !preg_match("/^[Jj]eudi$/", $day_name) && !preg_match("/^[Vv]endredi$/", $day_name) && !preg_match("/^[Ss]amedi$/", $day_name) && !preg_match("/^[Dd]imanche$/", $day_name))
	{
		echo "Wrong Fromat\n";
		return ;
	}


if (!preg_match("/^[1-9]$/", $day_number) && !preg_match("/^[1-2][0-9]$/", $day_number) && !preg_match("/^3[01]$/", $day_number))
	{
		echo "Wrong Fromat\n";
		return ;
	}

if (!preg_match("/^[0-5][0-9]$/", $sec) || !preg_match("/^[0-5][0-9]$/", $min) || (!preg_match("/^[0-1][0-9]$/", $hour) && !preg_match("/^2[0-3]$/", $hour)))
	{
		if (!preg_match("/^23:59:60$/", $txt1[4]) && !preg_match("/^24:00:00$/", $txt1[4]))
		echo "Wrong Fromat\n";
		return ;
	}
}
?>
