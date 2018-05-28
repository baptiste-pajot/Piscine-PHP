<?PHP

require_once 'Vertex.class.php';
require_once 'Vector.class.php';
require_once 'Matrix.class.php';

Class Camera
{
	private	$_origin;
	private $_v;
	private $_oppv;
	private $_orient;
	private $_ratio;
	private $_fov;
	private $_near;
	private $_far;
	private $_tT;
	private $_vm;
	private $_proj;
	private $_plan;
	public static $verbose = FALSE;

	public static function		doc()
	{
		echo( file_get_contents( "Camera.doc.txt" ) );
	}

	public function		__construct( array $kwargs )
	{
		if( array_key_exists( 'origin', $kwargs ) && array_key_exists ( 'orientation', $kwargs ) && ( ( array_key_exists( 'width', $kwargs ) && array_key_exists( 'height', $kwargs ) ) || array_key_exists( 'ratio', $kwargs ) ) && array_key_exists( 'fov', $kwargs ) && array_key_exists( 'near', $kwargs ) && array_key_exists( 'far', $kwargs ) )
		{
			if( $kwargs['origin'] instanceof Vertex )
				$this->_origin = clone $kwargs['origin'];
			if( $kwargs['orientation'] instanceof Matrix )
				$this->_orient = clone $kwargs['orientation'];
			if( array_key_exists( 'ratio', $kwargs ) )
				$this->_ratio = floatval( $kwargs['ratio'] );
			else
				$this->_ratio = $kwargs['width'] / $kwargs['height'];
			$this->_fov = floatval( $kwargs['fov'] );
			$this->_near = floatval( $kwargs['near'] );
			$this->_far = floatval( $kwargs['far'] );
			$this->_v = new Vector( array( 'dest' => $this->_origin ) );
			$this->_oppv = $this->_v->opposite();
			$this->_tT = new Matrix( array ( 'preset' => Matrix::TRANSLATION, 'vtc' => $this->_oppv ) );
			for ( $i = 0; $i < 3; $i++ )
			{
				for ( $j = 0; $j < 3; $j++ )
				{
					$tmp = floatval( $this->_orient->matrix[$i][$j] );
					$this->_orient->matrix[$i][$j] = floatval( $this->orient->matrix[$j][$i] );
					$this->_orient->matrix[$j][$i] = floatval( $tmp );
				}
			}
			$this->_vm = $this->_orient->mult( $this->_tT );
			$this->_proj = new Matrix( array( 'preset' => Matrix::PROJECTION, 'ratio' => $this->_ratio, 'fov' => $this->_fov, 'near' => $this->_near, 'far' => $this->_far ) );
			$this->_plan = $this->_vm->mult( $this->_proj );
			if( self::$verbose )
				echo "Camera instance constructed\n";
		}
	}

	public function		__destruct()
	{
		echo "Camera instance destructed\n";
	}

	public function		__toString()
	{
		$str = "Camera(\n";
		$str .= "+ Origine: ".$this->_origin."\n";
		$str .= "+ tT:\n".$this->_tT."\n";
		$str .= "+ tR:\n".$this->_orient."\n";
		$str .= "+ tR->mult( tT ):\n".$this->_vm."\n";
		$str .=  "+ Proj:\n".$this->_proj."\n)";
		return( $str );
	}

	public function		watchVertex( Vertex $worldVertex )
	{
		return ($this->_plan->transformVertex( $worldVertex ) );
	}
}
?>
