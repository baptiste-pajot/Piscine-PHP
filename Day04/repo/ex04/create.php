<?PHP
$path = "../private";
$file = "../private/passwd";
if (isset($_POST["login"], $_POST["passwd"], $_POST["submit"]) && $_POST["submit"] == "OK" && !empty($_POST["login"]) && !empty($_POST["passwd"]))
{
	if (!file_exists($path))
		mkdir($path);
	if (file_exists($file))
		$tab = unserialize(file_get_contents($file));
	else
		$tab = NULL;
	$user["login"] = $_POST["login"];
	$user["passwd"] = hash("whirlpool", $_POST["passwd"]);
	$doublon = FALSE;
	if (isset($tab))
	{
		foreach ($tab as $elem)
		{
			if ($user["login"] == $elem["login"])
				$doublon = TRUE;
		}
	}
	if ($doublon)
	{
		echo "ERROR\n";
		header("Refresh: 2; URL= index.html");
	}
	else
	{
		$tab[] = $user;
		file_put_contents($file, serialize($tab));
		echo "OK\n";
		header("Location: index.html");
	}
}
else
{
	echo "ERROR\n";
	header("Refresh: 2; URL= index.html");
}
?>
