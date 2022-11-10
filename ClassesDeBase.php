<?php
include_once ("FonctionsManipBD.php");

interface RegleSuiteMath
{
	public function __toString() : string;
	public function toDatabase() : void;
	public function getSuite() : string;
}

abstract class SuiteMath implements RegleSuiteMath
{
	protected $id=-1;
	protected $iStart;
	protected $iStop;
	protected $suite;

	public function __construct($d, $f){
		
		$this->iStart = $d;
		$this->iStop = $f;
	} 

	public function __toString() : string
	{
		$chaine = "<p> iStart : ".$this->iStart." <br> iStop : ".$this->iStop."</p>";
		$chaine .= "<p> Suite : ".$this->suite."</p>";
		return $chaine;
	}

	public function toDatabase() : void
	{
		$this->id = getElementID($this->iStart, $this->iStop);
		if($this->id == -1){
			insertion($this->iStart, $this->iStop, $this->suite);
		}
		else{
			miseAjour($id, $this->iStart, $this->iStop, $this->suite);
		}
	}

	abstract public function getSuite() : string;
}

class SuiteFibonacci extends SuiteMath
{
	private $typeSuite;

	public function __construct($d, $f, $t){
		parent::__construct($d, $f);
		$this->typeSuite = $t;
	} 

	public function getSuite() : string{
		$fn2 = 0;
		$fn1 = 1;
		$this->suite = "";
		
			 if( $iStart == 0 )	$this->suite = "$fn2 $fn1 ";
		else if( $iStart == 1 )	$this->suite = "$fn1 ";
		
		$i = 2;
		while( $i <= $iStop )
		{
			$fn = $fn1 + $fn2;
			if( ++$i > $iStart )
				$this->suite .= "$fn ";
			
			$fn2 = $fn1;
			$fn1 = $fn;
		}
		
		return $this->suite;
	}
}

class SuiteConway extends SuiteMath
{
	private $typeSuite;

	public function __construct($d, $f, $t){
		parent::__construct($d, $f);
		$this->typeSuite = $t;
	} 

	public function getSuite() : string{
		$x1 = 1;
	}
}

