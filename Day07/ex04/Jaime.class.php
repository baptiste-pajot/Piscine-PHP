<?PHP
Class Jaime extends Lannister
{
	public function sleepWith($name)
	{
		if ($name instanceof Cersei)
			echo "With pleasure, but only in Winterfell, then.\n";
		else
			parent::sleepWith($name);
	}
}
?>
