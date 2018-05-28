#!/usr/bin/php
<?php
function validateDate($date, $format)
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

if ($argc > 1)
{
	$txt1 = explode(" ", $argv[1]);
	if (count($txt1) != 5)
		exit ("Wrong Format\n");
	$txt2 = explode(":", $txt1[4]);
	if (count($txt2) != 3)
		exit ("Wrong Format\n");
	$day_name = $txt1[0];
	$day_number = $txt1[1];
	$month = $txt1[2];
	$year = $txt1[3];
	$hour = $txt2[0];
	$min = $txt2[1];
	$sec = $txt2[2];

	if (preg_match("/^[Ll]undi$/", $day_name))
		$day_week = "Mon";
	elseif (preg_match("/^[Mm]ardi$/", $day_name))
		$day_week = "Tue";
	elseif (preg_match("/^[Mm]ercredi$/", $day_name))
		$day_week = "Wed";
	elseif (preg_match("/^[Jj]eudi$/", $day_name))
		$day_week = "Thu";
	elseif (preg_match("/^[Vv]endredi$/", $day_name))
		$day_week = "Fri";
	elseif (preg_match("/^[Ss]amedi$/", $day_name))
		$day_week = "Sat";
	elseif (preg_match("/^[Dd]imanche$/", $day_name))
		$day_week = "Su";
	else
		exit ("Wrong Format\n");

	if (!preg_match("/^[1-9]$/", $day_number) && !preg_match("/^[1-2][0-9]$/", $day_number) && !preg_match("/^3[01]$/", $day_number))
		exit ("Wrong Format\n");

	if (preg_match("/^[Jj]anvier$/", $month))
		$month = 1;
	elseif (preg_match("/^[Ff][eé]vrier$/u", $month))
		$month = 2;
	elseif (preg_match("/^[Mm]ars$/", $month))
		$month = 3;
	elseif (preg_match("/^[Aa]vril$/", $month))
		$month = 4;
	elseif (preg_match("/^[Mm]ai$/", $month))
		$month = 5;
	elseif (preg_match("/^[Jj]uin$/", $month))
		$month = 6;
	elseif (preg_match("/^[Jj]uillet$/", $month))
		$month = 7;
	elseif (preg_match("/^[Aa]out$/", $month))
		$month = 8;
	elseif (preg_match("/^[Ss]eptembre$/", $month))
		$month = 9;
	elseif (preg_match("/^[Oo]ctobre$/", $month))
		$month = 10;
	elseif (preg_match("/^[Nn]ovembre$/", $month))
		$month = 11;
	elseif (preg_match("/^[Dd][ée]cembre$/u", $month))
		$month = 12;
	else
		exit ("Wrong Format\n");

	if (!preg_match("/^[0-9]{4}$/", $year))
		exit ("Wrong Format\n");

	if (!checkdate($month, $day_number, $year))
		exit ("Wrong Format\n");

	if (!preg_match("/^[0-5][0-9]$/", $sec) || !preg_match("/^[0-5][0-9]$/", $min) || (!preg_match("/^[0-1][0-9]$/", $hour) && !preg_match("/^2[0-3]$/", $hour)))
	{
		exit ("Wrong Format\n");
	}

	date_default_timezone_set("Europe/Paris");
	$txt = $year." ".$month." ".$day_number." ".$day_week." ".$hour." ".$min." ".$sec;
	if (!validateDate($txt, 'Y n j D H i s'))
		exit ("Wrong Format\n");

	$timestamp = mktime($hour, $min, $sec, $month, $day_number, $year);
	echo $timestamp."\n";
}
?>
