<?PHP
if(isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] == "set" && isset($_GET["value"]))
		setcookie($_GET["name"], $_GET["value"]);
	if ($_GET["action"] == "get" && isset($_COOKIE[$_GET["name"]]))
		echo $_COOKIE[$_GET["name"]]."\n";
	if ($_GET["action"] == "del")
		setcookie($_GET["name"], "", time() - 3600);
}
?>
