<?PHP
Class House
{
	public function introduce()
	{
		echo "House ".static::getHouseName()." of ".static::getHouseSeat()." : \"".static::getHouseMotto()."\"\n";
	}
}
?>
