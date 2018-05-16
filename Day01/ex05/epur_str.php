#!/usr/bin/php
<?php
function ft_split($txt)
{
	$tab1 = explode(" ", $txt);
	$i = 0;
	foreach ($tab1 as $element)
	{
		if ($element != NULL)
		{
			$tab2[$i] = $element;
			$i++;
		}
	}
	return ($tab2);
}

if ($argc == 2)
{
	$tab = ft_split($argv[1]);
	$l = count($tab);
	$i = 0;
	while ($i < $l)
	{
		$txt .= $tab[$i];
		if ($i == $l - 1)
			$txt .= "\n";
		else
			$txt .= " ";
		$i++;
	}
	echo $txt;
}
?>
