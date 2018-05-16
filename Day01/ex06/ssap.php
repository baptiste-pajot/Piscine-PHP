#!/usr/bin/php
<?php
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
		sort($tab2);
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
