<?PHP
function auth($login, $passwd)
{
	$file = "../private/passwd";
	if (isset($login, $passwd) && !empty($login) && !empty($passwd))
	{
		$tab = unserialize(file_get_contents($file));
		if ($tab === FALSE)
			return (FALSE);
		$hash = hash("whirlpool", $passwd);
		if (isset($tab))
		{
			foreach ($tab as $elem)
			{
				if ($login == $elem["login"] && $hash == $elem["passwd"])
					return(TRUE);
			}
			return (FALSE);
		}
		else
			return (FALSE);
	}
	else
		return (FALSE);
}
?>
