<?PHP
Class Car extends Vessel
{
	public function		__construct()
	{
		parent::__construct();
		$this->_name = "Car";
		$this->_size = array (1 , 2);
		$this->_sprite_path = "";
		$this->_pt_life = 5;
		$this->_pp = 5;
		$this->_speed = 5;
		$this->_inertia = 5;
	}
}
?>
