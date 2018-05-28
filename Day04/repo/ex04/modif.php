<?PHP
$file = "../private/passwd";
if (isset($_POST["login"], $_POST["oldpw"], $_POST["newpw"], $_POST["submit"]) && $_POST["submit"] == "OK" && !empty($_POST["login"]) && !empty($_POST["oldpw"]) && !empty($_POST["newpw"]))
{
	$tab = unserialize(file_get_contents($file));
	if ($tab === FALSE)
		exit ("ERROR\n");
	$user["login"] = $_POST["login"];
	$user["oldpw"] = hash("whirlpool", $_POST["oldpw"]);
	$user["newpw"] = hash("whirlpool", $_POST["newpw"]);
	$match = FALSE;
	if (isset($tab))
	{
		foreach ($tab as & $elem)
		{
			if ($user["login"] == $elem["login"] && $user["oldpw"] == $elem["passwd"])
			{
				$match = TRUE;
				$elem["passwd"] = $user["newpw"];
			}
		}
	}
	if ($match)
	{
		file_put_contents($file, serialize($tab));
		echo "OK\n";
		header("Location: index.html");
	}
	else
	{
		echo "ERROR\n";
		header("Refresh: 2; URL= index.html");
	}
}
else
{
	echo "ERROR\n";
	header("Refresh: 2; URL= index.html");
}
?>
