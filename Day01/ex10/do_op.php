#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return ;
}
$nb1 = trim($argv[1], " \t");
$op = trim($argv[2], " \t");
$nb2 = trim($argv[3], " \t");
if (is_numeric($nb1) && is_numeric($nb2))
{
	if ($op == "+")
		echo ($nb1 + $nb2)."\n";
	elseif ($op == "-")
		echo ($nb1 - $nb2)."\n";
	elseif ($op == "*")
		echo ($nb1 * $nb2)."\n";
	elseif ($op == "/" && $nb2 != 0)
		echo ($nb1 / $nb2)."\n";
	elseif ($op == "%" && $nb2 != 0)
		echo ($nb1 % $nb2)."\n";
}
?>
