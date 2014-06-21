<?php 
		
class Bus {
	public $speed = 0;
	public $armed = false;
	public $exploded = false;		
	
	function setSpeed($speed) {
		$this->speed = $speed;
		if (($speed > 50) && ($exploded == false)) {
			$this->armed = true;
		}
		
		elseif (($speed < 50) && ($armed == true)) {
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
		  return "true";
	  } else {
		  return "false";
	  }
}
?>




