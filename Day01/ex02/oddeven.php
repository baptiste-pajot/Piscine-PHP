#!/usr/bin/php
<?php
$fd = fopen("php://stdin", "r");

echo "Entrez un nombre: ";
while ($line = fgets($fd))
{
	$line = trim($line, "\n");
	if (is_numeric($line))
	{
		if (intval($line) % 2)
			echo "Le chiffre $line est Impair\n";
		else
			echo "Le chiffre $line est Pair\n";
	}
	else
		echo "'$line' n'est pas un chiffre\n";
	echo "Entrez un nombre: ";
}
echo "\n";
?>
