<?PHP
require_once("Vessel.class.php");
Class Team
{
	private $_tab;
	private $_player = 1;
	private $_active = FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Team.doc.txt" ) );
	}

	public function		getPlayer()
	{
		return( $this->_player );
	}

	public function		getTab()
	{
		return( $this->_tab );
	}

	public function		__construct()
	{
		$this->_tab[1][] = new Car();
		$this->_tab[1][] = new Car();
		$this->_tab[1][] = new Plane();
		$this->_tab[2][] = new Car();
		$this->_tab[2][] = new Plane();
	}

	public function		__toString()
	{
		$str1 = "Team 1 :<br>";
		foreach ($this->_tab[1] as $elem)
			$str1 .= $elem->getId()." ".$elem->getName()."<br>";
		$str2 = "<br>Team 2 :<br>";
		foreach ($this->_tab[2] as $elem)
			$str2 .= $elem->getId()." ".$elem->getName()."<br>";
		$str = $str1.$str2;
		return ($str);
	}
}
?>
