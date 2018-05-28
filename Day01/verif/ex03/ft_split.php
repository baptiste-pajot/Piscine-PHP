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
	if ($tab2)
		sort($tab2);
	return ($tab2);
}
?>
