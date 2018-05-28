#!/usr/bin/php
<?php
if ($argc > 2)
{
	$i = 2;
	while ($i < $argc)
	{
		$tab = explode(":", $argv[$i]);
		$hash[$tab[0]] = $tab[1];
		$i++;
	}
	if ($hash[$argv[1]])
		echo $hash[$argv[1]]."\n";
}
?>
