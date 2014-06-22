<?php 
		
class Bus {
	public $speed = 0;
	public $armed = false;
	public $exploded = false;		
	
	function setSpeed($mph) {
		
		$this->speed = $mph;
		
		if (($mph > 50) && $this->armed == false) {
			$this->armed = true;
		}
		
		elseif (($mph < 50) && $this->armed == true) {
			$this->exploded = true;	
		}	
	}
	
	function getSpeed() {
		$this->speed;
	}
	
	function trigger() {
		$this->exploded = true;
		return boolToString($this);	
	}	
}

function boolToString($input) {
	  if ($input) {
		  return "True";
	  } else {
		  return "False";
	  }
}
?>





