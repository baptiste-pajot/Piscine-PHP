<?PHP
include "auth.php";
session_start();
$file = "../private/chat";
if (isset($_SESSION["loggued_on_user"]) && !empty($_SESSION["loggued_on_user"]))
{
	if (isset($_POST["txt"]) && !empty($_POST["txt"]))
	{
		$line["login"] = $_SESSION["loggued_on_user"];
		date_default_timezone_set("Europe/Paris");
		$line["time"] = time();
		$line["msg"] = $_POST["txt"];
		if (file_exists($file))
		{
			$fd = fopen($file, 'r');
			flock($fd, LOCK_EX);
			$chat = unserialize(file_get_contents($file));
		}
		else
			$chat = NULL;
		$chat[] = $line;
		file_put_contents($file, serialize($chat));
		flock($fd, LOCK_UN);
	}
?>
<html>
<head>
	<script langage="javascript">
	top.frames['chat'].location = 'chat.php';
	</script>
</head>
<body>
<form method="post" action="speak.php">
		<input type="text" name="txt" value="" size="100"/>
		<input type="submit" name="submit" value="Envoyer" />
</form>
</body>
</html>
<?PHP
}
?>
