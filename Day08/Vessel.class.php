<?PHP
require_once("Car.class.php");
require_once("Plane.class.php");
Class Vessel
{
	protected $_name = "other";
	protected $_active = FALSE;
	protected $_pos = array( 2, 2 );
	protected $_ori = 0;
	protected $_size = array (0 , 0);
	protected $_sprite_path;
	protected $_pt_life;
	protected $_pp;
	protected $_speed;
	protected $_inertia;
	static private $_count  = 0;
	private $_id;


	public static function		doc()
	{
		echo( file_get_contents( "Vessel.doc.txt" ) );
	}

	public function		getId()
	{
		return ($this->_id);
	}

	public function		getName()
	{
		return ($this->_name);
	}

	public function		getActive()
	{
		return ($this->_active);
	}

	public function		setActive()
	{
		$this->_active = TRUE;
	}

	public function		getPos()
	{
		return ($this->_pos);
	}

	public function		getOri()
	{
		return ($this->_ori);
	}

	public function		__construct()
	{
		self::$_count++;
		$this->_id = self::$_count;
	}

	public function		__toString()
	{
		if( $this->getActive() )
			$bool = "activated";
		else
			$bool = "not activated";
		$str = "Vessel: ".$this->getId()." ".$this->getName()." activation: "
			.$bool."<br>";
		return ($str);
	}
}
?>
