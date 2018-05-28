<?PHP
Class Targaryen
{
	public function resistsFire()
	{
		return FALSE;
	}

	public function getBurned()
	{
		if ( static::resistsFire()  )
			return "emerges naked but unharmed";
		else
			return "burns alive";
	}
}
?>
