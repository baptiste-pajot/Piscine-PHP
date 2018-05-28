<?PHP
Class UnholyFactory
{
	public $tab = array ();

	public function absorb( $fighter )
	{
		if ($fighter instanceof Fighter )
		{
			if ( $fighter instanceof Footsoldier )
			{
				if ( !array_key_exists( 'foot soldier', $this->tab ) )
				{
					$this->tab['foot soldier'] = $fighter;
					echo "(Factory absorbed a fighter of type foot soldier)\n";
				}
				else
					echo "(Factory already absorbed a fighter of type foot soldier)\n";
			}
			if ( $fighter instanceof Archer )
			{
				if ( !array_key_exists( 'archer', $this->tab ) )
				{
					$this->tab['archer'] = $fighter;
					echo "(Factory absorbed a fighter of type archer)\n";
				}
				else
					echo "(Factory already absorbed a fighter of type archer)\n";
			}
			if ( $fighter instanceof Assassin )
			{
				if ( !array_key_exists( 'assassin', $this->tab ) )
				{
					$this->tab['assassin'] = $fighter;
					echo "(Factory absorbed a fighter of type assassin)\n";
				}
				else
					echo "(Factory already absorbed a fighter of type assassin)\n";
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
	}
	public function fabricate($fighter)
	{
		if ($fighter == "foot soldier" || $fighter == "archer" || $fighter == "assassin" )
		{
			if ( $fighter == "foot soldier" )
			{
					echo "(Factory fabricates a fighter of type foot soldier)\n";
					return( new Footsoldier() );
			}
			if ( $fighter == "archer" )
			{
					echo "(Factory fabricates a fighter of type archer)\n";
					return( new Archer() );
			}
			if ( $fighter == "assassin" )
			{
					echo "(Factory fabricates a fighter of type assassin)\n";
					return( new Assassin() );
			}
		}
		else
			echo "(Factory hasn't absorbed any fighter of type ".$fighter.")\n";
	}
}
?>
