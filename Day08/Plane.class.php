<?PHP
Class Plane extends Vessel
{
	public function		__construct()
	{
		parent::__construct();
		$this->_name = "Plane";
		$this->_size = array (1 , 3);
		$this->_sprite_path = "";
		$this->_pt_life = 10;
		$this->_pp = 10;
		$this->_speed = 10;
		$this->_inertia = 10;
	}
}
?>
