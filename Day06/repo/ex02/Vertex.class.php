<?PHP

require_once 'Color.class.php';

Class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Vertex.doc.txt" ) );
	}
	
	public function		getX( )
	{
		return ($this->_x);
	}

	public function		getY( )
	{
		return ($this->_y);
	}

	public function		getZ( )
	{
		return ($this->_z);
	}

	public function		getW( )
	{
		return ($this->_w);
	}

	public function		getColor( )
	{
		return ($this->_color);
	}

	public function		setX($x)
	{
		$this->_x = $x;
		return;
	}

	public function		setY($y)
	{
		$this->_y = $y;
		return;
	}

	public function		setZ($z)
	{
		$this->_z = $z;
		return;
	}

	public function		setW($w)
	{
		$this->_w = $w;
		return;
	}

	public function		setColor($color)
	{
		$this->_color = $color;
		return;
	}

	public function		__construct( array $kwargs )
	{
		if ( array_key_exists( 'x', $kwargs ) && array_key_exists( 'y', $kwargs ) && array_key_exists( 'z', $kwargs ) )
		{
			$this->_x = floatval( $kwargs['x'] );
			$this->_y = floatval( $kwargs['y'] );
			$this->_z = floatval( $kwargs['z'] );
		}
		if ( array_key_exists( 'w', $kwargs ) )
			$this->_w = floatval( $kwargs['w'] );
		if ( array_key_exists( 'color', $kwargs ) && $kwargs['color'] instanceof Color)
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color( array( 'rgb' => 0xffffff ) );
		if ( self::$verbose )
		{
			$color = ", Color( red: ".sprintf( "% 3d", $this->_color->red ).", green: ".sprintf( "% 3d", $this->_color->green ).", blue: ".sprintf( "% 3d", $this->_color->blue )." ) )";
			$str = "Vertex( x: ".sprintf( "%.2f", $this->_x ).", y: ".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w ).$color;
			echo $str." constructed\n";
		}
	}

	public function		__destruct()
	{
		if ( self::$verbose )
		{
			$color = ", Color( red: ".sprintf( "% 3d", $this->_color->red ).", green: ".sprintf( "% 3d", $this->_color->green ).", blue: ".sprintf( "% 3d", $this->_color->blue )." ) )";
			$str = "Vertex( x: ".sprintf( "%.2f", $this->_x ).", y: ".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w ).$color;
			echo $str." destructed\n";
		}
	}

	public function		__toString()
	{
		if ( self::$verbose )
			$color = ", Color( red: ".sprintf( "% 3d", $this->_color->red ).", green: ".sprintf( "% 3d", $this->_color->green ).", blue: ".sprintf( "% 3d", $this->_color->blue )." ) )";
		else
			$color = " )";
		$str = "Vertex( x: ".sprintf( "%.2f", $this->_x ).", y: ".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w ).$color;
		return $str;
	}
}
?>
