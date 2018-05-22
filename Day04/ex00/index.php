<?PHP
session_start();
if (isset($_GET["login"], $_GET["passwd"], $_GET["submit"]) && $_GET["submit"] == "OK" && !empty($_GET["login"]) && !empty($_GET["passwd"]))
{
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
?>
<html><body>
<form method="get">
	Identifiant: <input type="text" name="login" value="<?PHP
if (isset($_SESSION["login"]))
	echo $_SESSION["login"];
?>
" />
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?PHP
if (isset($_SESSION["passwd"]))
	echo $_SESSION["passwd"];
?>
" />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
