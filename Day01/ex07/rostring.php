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
	return($tab2);
}

function rostring($tab)
{
	if ($tab)
	{
		$l = count($tab);
		$i = 0;
		$buf = $tab[0];
		while ($i < $l -1)
		{
			$tab[$i] = $tab[$i + 1];
			$i++;
		}
		$tab[$l -1] = $buf;
	}
	return ($tab);
}

if ($argc > 1)
{
	$tab = ft_split($argv[1]);
	$tab = rostring($tab);
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
