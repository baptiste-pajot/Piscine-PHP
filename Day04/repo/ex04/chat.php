<?PHP
session_start();
$file = "../private/chat";
$fd = fopen($file, 'r');
flock($fd, LOCK_EX);
$chat = unserialize(file_get_contents($file));
flock($fd, LOCK_UN);
date_default_timezone_set("Europe/Paris");
if (isset($chat))
{
	foreach ($chat as $line)
	{
		$date = date('[H:i]' , $line["time"]);
		echo $date." ";
		echo "<b>".$line["login"]."</b>: ";
		echo $line["msg"]."<br />\n";
	}
}
?>
