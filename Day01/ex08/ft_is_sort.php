<?php
function ft_is_sort($tab)
{
	if ($tab)
	{
		$l = count($tab);
		$i = 0;
		while ($i < $l - 1)
		{
			if (strcmp($tab[$i], $tab[$i + 1]) > 0)
				return (FALSE);
			$i++;
		}
		return (TRUE);
	}
	else
		return(TRUE);
}
?>
