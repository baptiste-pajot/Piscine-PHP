<?PHP
Class Lannister
{
	public function sleepWith($name)
	{
		if ($name instanceof self)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
}
?>
