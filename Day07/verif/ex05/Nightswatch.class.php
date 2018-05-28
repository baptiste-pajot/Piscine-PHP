<?PHP
Class Nightswatch
{
	public $tab;

	public function recruit($name)
	{
		if ($name instanceof IFighter)
			$this->tab[] = $name;
	}

	public function fight()
	{
		foreach ($this->tab as $element)
			$element->fight();
	}
}
?>
