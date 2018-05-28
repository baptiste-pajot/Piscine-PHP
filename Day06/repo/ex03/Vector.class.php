<?PHP

require_once 'Vertex.class.php';

Class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	public static $verbose = FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Vector.doc.txt" ) );
	}

	public function		getX()
	{
		return ($this->_x);
	}

	public function		getY()
	{
		return ($this->_y);
	}

	public function		getZ()
	{
		return ($this->_z);
	}

	public function		getW()
	{
		return ($this->_w);
	}


	public function		__construct( array $kwargs )
	{
		if ( array_key_exists( 'dest', $kwargs ) && $kwargs['dest'] instanceof Vertex )
		{
			if ( array_key_exists( 'orig', $kwargs ) && $kwargs['orig'] instanceof Vertex )
			{
				$this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
				$this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
				$this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
			}
			else
			{
				$orig = new Vertex( array ( 'x' => 0, 'y' => 0, 'z' => 0, 'w'=> 1 ) );
				$this->_x = $kwargs['dest']->getX() - $orig->getX();
				$this->_y = $kwargs['dest']->getY() - $orig->getY();
				$this->_z = $kwargs['dest']->getZ() - $orig->getZ();
			}
		}
		if ( self::$verbose )
		{
			$str = "Vector( x:".sprintf( "%.2f", $this->_x ).", y:".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w )." )";
			echo $str." constructed\n";
		}
	}

	public function		__destruct()
	{
		if ( self::$verbose )
		{
			$str = "Vector( x:".sprintf( "%.2f", $this->_x ).", y:".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w )." )";
			echo $str." destructed\n";
		}
	}

	public function		__toString()
	{
		$str = "Vector( x:".sprintf( "%.2f", $this->_x ).", y:".sprintf( "%.2f", $this->_y ).", z:".sprintf( "%.2f", $this->_z ).", w:".sprintf( "%.2f", $this->_w )." )";
		return $str;
	}

	public function		magnitude()
	{
		return sqrt( pow( $this->_x, 2 ) + pow( $this->_y, 2 ) + pow( $this->_z, 2 ) );
	}

	public function		normalize()
	{
		if (($m = $this->magnitude()) == 1.0)
			return clone $this;
		else
		{
			$dest = new Vertex( array ( 'x' =>  ( $this->_x / $m ), 'y' => ( $this->_y / $m ), 'z' => ( $this->_z / $m ) ) );
			return new Vector( array( 'dest' => $dest ) );
		}
	}

	public function		add( Vector $rhs )
	{
		$dest = new Vertex( array ( 'x' =>  ( $this->_x + $rhs->getX() ), 'y' => ( $this->_y + $rhs->getY() ), 'z' => ($this->_z + $rhs->getZ() ) ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function		sub( Vector $rhs )
	{
		$dest = new Vertex( array ( 'x' =>  ( $this->_x - $rhs->getX() ), 'y' => ( $this->_y - $rhs->getY() ), 'z' => ($this->_z - $rhs->getZ() ) ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function		opposite()
	{
		$dest = new Vertex( array ( 'x' =>  ( -$this->_x ), 'y' => ( -$this->_y ), 'z' => ( -$this->_z  ) ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function		scalarProduct( $k )
	{
		$dest = new Vertex( array ( 'x' =>  ( $this->_x * $k ), 'y' => ( $this->_y * $k ), 'z' => ($this->_z * $k ) ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function		dotProduct( Vector $rhs )
	{
		return ( $this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ() );
	}

	public function		crossProduct( Vector $rhs )
	{
		$dest = new Vertex( array ( 'x' =>  ( $this->_y * $rhs->getZ() - $this->_z * $rhs->getY() ), 'y' => ( $this->_z * $rhs->getX() - $this->_x * $rhs->getZ() ), 'z' => ($this->_x * $rhs->getY() - $this->_y * $rhs->getX() ) ) );
		return new Vector( array( 'dest' => $dest ) );
	}

	public function		cos( Vector $rhs )
	{
		return ($this->dotProduct( $rhs ) / $this->magnitude() / $rhs->magnitude() );
	}
}
