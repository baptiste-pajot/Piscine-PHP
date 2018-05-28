#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return ;
}
if (strlen($argv[1]) < 3)
{
	echo "Syntax Error\n";
	return ;
}
$txt = trim($argv[1], " ");
$tab = str_split($txt);
$i = 1;
$tab1[]=$tab[0];
if (count($tab) < 3)
{
	echo "Syntax Error\n";
	return ;
}
while ($tab[$i] != "+" && $tab[$i] != "-" && $tab[$i] != "*" && $tab[$i] != "/" && $tab[$i] != "%")
{
	$tab1[] = $tab[$i];
	$i++;
	if ($i == count($tab))
	{
		echo "Syntax Error\n";
		return ;
	}
}
$nb1 =  trim(implode($tab1), " ");
$op = $tab[$i];
$i++;
while ($i != count($tab))
{
	$tab2[] = $tab[$i];
	$i++;
}
$nb2 =  trim(implode($tab2), " ");
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
else
{
	echo "Syntax Error\n";
	return ;
}
?>
