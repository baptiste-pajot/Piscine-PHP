<?PHP

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

Class Matrix
{
	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;
	private $_preset = 0;
	public $matrix = array( array( 0, 0, 0, 0 ), array( 0, 0, 0, 0 ), array( 0, 0, 0, 0 ), array ( 0, 0, 0, 0 ) );
	public static $verbose = FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Matrix.doc.txt" ) );
	}

	public function		__construct( array $kwargs )
	{
		if ( array_key_exists( 'preset', $kwargs ) )
		{
			switch ( $kwargs['preset'] )
			{
			case 1:
				$this->_preset = 1;
				$this->matrix = array( array( 1, 0, 0, 0 ), array( 0, 1, 0, 0 ), array( 0, 0 , 1, 0 ), array ( 0, 0, 0, 1 ) );
				if ( self::$verbose )
					echo "Matrix IDENTITY instance constructed\n";
				break;
			case 2:
				if ( array_key_exists( 'scale', $kwargs ) )
				{
					$this->_preset = 2;
					$scale = floatval( $kwargs['scale'] );
					$this->matrix = array( array( $scale, 0, 0, 0 ), array( 0, $scale, 0, 0 ), array( 0, 0 , $scale, 0 ), array ( 0, 0, 0, 1 ) );
					if ( self::$verbose )
						echo "Matrix SCALE preset instance constructed\n";
				}
				break;
			case 3:
				if ( array_key_exists( 'angle', $kwargs ) )
				{
					$this->_preset = 3;
					$angle = floatval( $kwargs['angle'] );
					$this->matrix = array( array(1, 0, 0, 0 ), array( 0, cos( $angle ), -sin( $angle ), 0 ), array( 0, sin( $angle ) , cos( $angle ), 0 ), array ( 0, 0, 0, 1 ) );
					if ( self::$verbose )
						echo "Matrix Ox ROTATION preset instance constructed\n";
				}
				break;
			case 4:
				if ( array_key_exists( 'angle', $kwargs ) )
				{
					$this->_preset = 4;
					$angle = floatval( $kwargs['angle'] );
					$this->matrix = array( array( cos( $angle ), 0, sin( $angle ), 0 ), array( 0, 1, 0, 0 ), array( ( -sin( $angle ) ), 0 , cos( $angle ), 0 ), array ( 0, 0, 0, 1 ) );
					if ( self::$verbose )
						echo "Matrix Oy ROTATION preset instance constructed\n";
				}
				break;
			case 5:
				if ( array_key_exists( 'angle', $kwargs ) )
				{
					$this->_preset = 5;
					$angle = floatval( $kwargs['angle'] );
					$this->matrix = array( array( cos( $angle ), -sin( $angle ), 0, 0 ), array( sin( $angle ), cos( $angle ), 0, 0 ), array( 0, 0 , 1, 0 ), array ( 0, 0, 0, 1 ) );
					if ( self::$verbose )
						echo "Matrix Oz ROTATION preset instance constructed\n";
				}
				break;
			case 6:
				if ( array_key_exists( 'vtc', $kwargs ) )
				{
					$this->_preset = 6;
					$this->matrix = array( array( 1, 0, 0, $kwargs['vtc']->getX() ), array( 0, 1, 0, $kwargs['vtc']->getY() ), array( 0, 0 , 1, $kwargs['vtc']->getZ() ), array ( 0, 0, 0, 1 ) );
					if ( self::$verbose )
						echo "Matrix TRANSLATION preset instance constructed\n";
				}
				break;
			case 7:
				if ( array_key_exists( 'fov', $kwargs ) && array_key_exists( 'ratio', $kwargs ) && array_key_exists( 'near', $kwargs ) && array_key_exists( 'far', $kwargs ) )
				{
					$this->_preset = 7;
					$fov = floatval($kwargs['fov']);
					$ratio = floatval($kwargs['ratio']);
					$near = floatval($kwargs['near']);
					$far = floatval($kwargs['far']);
					$top = $near * tan ( M_PI / 180.0 * $fov / 2);
					$right = $top * $ratio;
					$this->matrix = array( array( $near / $right, 0, 0, 0 ), array( 0, $near / $top, 0, 0 ), array( 0, 0 , -( $far + $near ) / ( $far - $near ), -2 * $far * $near / ( $far - $near ) ), array( 0, 0, -1, 0 ) );
					if ( self::$verbose )
						echo "Matrix PROJECTION preset instance constructed\n";
				}
				break;
			}
		}
	}

	public function		__destruct()
	{
		if (self::$verbose)
			echo "Matrix instance destructed\n";
	}

	public function		 __toString()
	{
		$str = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$str .= "-----------------------------\n";
		$str .= "x | ".sprintf("%.2f", $this->matrix[0][0])." | ".sprintf("%.2f", $this->matrix[0][1])." | ".sprintf("%.2f", $this->matrix[0][2])." | ".sprintf("%.2f", $this->matrix[0][3])."\n";
		$str .= "y | ".sprintf("%.2f", $this->matrix[1][0])." | ".sprintf("%.2f", $this->matrix[1][1])." | ".sprintf("%.2f", $this->matrix[1][2])." | ".sprintf("%.2f", $this->matrix[1][3])."\n";
		$str .= "z | ".sprintf("%.2f", $this->matrix[2][0])." | ".sprintf("%.2f", $this->matrix[2][1])." | ".sprintf("%.2f", $this->matrix[2][2])." | ".sprintf("%.2f", $this->matrix[2][3])."\n";
		$str .= "w | ".sprintf("%.2f", $this->matrix[3][0])." | ".sprintf("%.2f", $this->matrix[3][1])." | ".sprintf("%.2f", $this->matrix[3][2])." | ".sprintf("%.2f", $this->matrix[3][3]);
		return( $str );
	}

	public function		mult( Matrix $rhs)
	{
		$mult = new Matrix( array() );
		for ( $i = 0; $i <= 3; $i++ )
		{
			for ( $j = 0; $j <= 3; $j++ )
			{
				for ( $k = 0; $k <= 3; $k++ )
					$mult->matrix[$i][$j] += $this->matrix[$i][$k] * $rhs->matrix[$k][$j];
			}
		}
		return( $mult);
	}

	public function		transformVertex( Vertex $vtx)
	{
		$trvtx = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0 ) );
		$tmp = 0;
		$tmp += $this->matrix[0][0] * $vtx->getX();
		$tmp += $this->matrix[0][1] * $vtx->getY();
		$tmp += $this->matrix[0][2] * $vtx->getZ();
		$tmp += $this->matrix[0][3] * $vtx->getW();
		$trvtx->setX( $tmp );
		$tmp = 0;
		$tmp += $this->matrix[1][0] * $vtx->getX();
		$tmp += $this->matrix[1][1] * $vtx->getY();
		$tmp += $this->matrix[1][2] * $vtx->getZ();
		$tmp += $this->matrix[1][3] * $vtx->getW();
		$trvtx->setY( $tmp );
		$tmp = 0;
		$tmp += $this->matrix[2][0] * $vtx->getX();
		$tmp += $this->matrix[2][1] * $vtx->getY();
		$tmp += $this->matrix[2][2] * $vtx->getZ();
		$tmp += $this->matrix[2][3] * $vtx->getW();
		$trvtx->setZ( $tmp );
		$tmp = 0;
		$tmp += $this->matrix[3][0] * $vtx->getX();
		$tmp += $this->matrix[3][1] * $vtx->getY();
		$tmp += $this->matrix[3][2] * $vtx->getZ();
		$tmp += $this->matrix[3][3] * $vtx->getW();
		$trvtx->setW( $tmp );
		return( $trvtx );
	}
}
