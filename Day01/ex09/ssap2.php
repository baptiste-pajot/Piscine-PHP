#!/usr/bin/php
<?php

function ft_charcmp($c1, $c2)
{
	if (ctype_alpha($c1) && ctype_alpha($c2))
		return (strcasecmp ($c1, $c2));
	elseif (ctype_digit($c1) && ctype_digit($c2))
		return (strcmp ($c1, $c2));
	elseif (!ctype_alpha($c1) && !ctype_digit($c1) && !ctype_alpha($c2) &&
		!ctype_digit($c2))
		return (strcmp ($c1, $c2));
	elseif (ctype_alpha($c1) && (ctype_digit($c2) || (!ctype_alpha($c2) &&
		!ctype_digit($c2))))
		return (-1);
	elseif (ctype_digit($c1) && ctype_alpha($c2))
		return (1);
	elseif (ctype_digit($c1) && !ctype_alpha($c2) && !ctype_digit($c2))
		return (-1);
	elseif (!ctype_alpha($c1) && !ctype_digit($c1) && (ctype_alpha ($c2) ||
		ctype_digit($c2)))
		return (1);
}

function ft_strcmp($str1, $str2)
{
	$array1 = str_split($str1);
	$array2 = str_split($str2);
	$l1 = count($array1);
	$l2 = count($array2);
	$i = 0;
	while ($i < $l1 && $i < $l2)
	{
		if (ft_charcmp($array1[$i], $array2[$i]) < 0)
			return (-1);
		elseif (ft_charcmp($array1[$i], $array2[$i]) > 0)
			return (1);
		$i++;
	}
	if ($i < $l1)
		return (1);
	elseif ($i < $l2)
		return (-1);
	else
		return (0);
}

function ft_split($txt)
{
	$tab1 = explode(" ", $txt);
	$i = 0;
	foreach($tab1 as $element)
	{
		if ($element != NULL)
		{
			$tab2[$i] = $element;
			$i++;
		}
	}
	if ($tab2)
		usort($tab2, "ft_strcmp");
	return($tab2);
}

$i = 1;
while ($i < $argc)
{
	$tab = ft_split($argv[$i]);
	$l = count($tab);
	$j = 0;
	while ($j < $l)
	{
		$txt .= $tab[$j];
		$txt .= " ";
		$j++;
	}
	$i++;
}
if ($argc > 1)
{
	$tab = ft_split($txt);
	if ($tab)
	{
		foreach($tab as $element)
			echo $element."\n";
	}
}
?>
