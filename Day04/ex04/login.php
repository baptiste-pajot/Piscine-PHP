<?PHP
include "auth.php";
session_start();
if (isset($_POST["login"], $_POST["passwd"]) && !empty($_POST["login"]) && !empty($_POST["passwd"]))
{
	if (auth($_POST["login"], $_POST["passwd"]))
	{
		$_SESSION["loggued_on_user"] = $_POST["login"];
		//echo "OK\n";
?>
<html>
<body>
	<iframe name="chat" src="chat.php" height="550px" width="100%"></iframe>
	<iframe name="speak" src="speak.php" height="50px" width="100%"></iframe>
</body>
</html>
<?PHP
	}
	else
	{
		$_SESSION["loggued_on_user"] = "";
	}
}
?>
