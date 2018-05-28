<?PHP
Class Color
{
	public $red				= 0;
	public $green			= 0;
	public $blue			= 0;
	public static $verbose	= FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Color.doc.txt" ) );
	}
	
	public function		__construct( array $kwargs )
	{
		if ( array_key_exists( 'rgb', $kwargs ) )
		{
			$this->red = intval( $kwargs['rgb'] / 256 / 256 );
			$this->green = intval( $kwargs['rgb'] / 256 % 256 );
			$this->blue = intval( $kwargs['rgb'] % 256 );
		}
		elseif ( array_key_exists( 'red', $kwargs ) && array_key_exists( 'green', $kwargs ) && array_key_exists( 'blue', $kwargs ) )
		{
			$this->red = intval( $kwargs['red'] );
			$this->green = intval( $kwargs['green'] );
			$this->blue = intval( $kwargs['blue'] );
		}
		if ( self::$verbose )
		{
			echo "Color( red: ";
			printf( "% 3d", $this->red );
			echo ", green: ";
			printf( "% 3d", $this->green );
			echo ", blue: ";
			printf( "% 3d", $this->blue );
			echo " ) constructed.\n";
		}
	}

	public function		__destruct()
	{
		if ( self::$verbose )
		{
			echo "Color( red: ";
			printf( "% 3d", $this->red );
			echo ", green: ";
			printf( "% 3d", $this->green );
			echo ", blue: ";
			printf( "% 3d", $this->blue );
			echo " ) destructed.\n";
		}
	}

	public function		__toString()
	{
			$str = "Color( red: ".sprintf( "% 3d", $this->red ).", green: ".sprintf( "% 3d", $this->green ).", blue: ".sprintf( "% 3d", $this->blue )." )";
		return $str;
	}

	public function		add( Color $rhs )
	{
			$return = new Color( array ( 'red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue ) );
			return $return;
	}

	public function		sub( Color $rhs )
	{
			$return = new Color( array ( 'red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue ) );
			return $return;
	}

	public function		mult( $f )
	{
			$return = new Color( array ( 'red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f ) );
			return $return;
	}
}
