<?php 
	class Bus {
		public $armed = "false";
		public $exploded = "false";
		public $speed = 0;
		
		function armed($speed) {
			if ($speed < 50) {
				$this->armed = "true";	
			}
			echo $this->armed . " is the armed status"; 
		}
		
		function exploded($speed) {
			if (($speed < 50) || ($armed == "true")) {
				$this->exploded = "true";	
			}	
			echo $this->exploded . " is the exploded status"; ?><br><?php		
		}
		
		function setSpeed($speed) {
			$this->speed = $speed;
			if (($speed > 50) && ($armed = "false")) {
				$this->armed = "true";
			}
		}
		
		function getSpeed() {
			$this->speed;
			echo $this->speed . " mph is the speed";	
		}
		
		function trigger() {
			$this->exploded = "true";	
		}	
		
		function showResults() {
			echo $this->speed . " mph is the speed"; ?><br><?php
			echo $this->armed . " is the armed status"; ?><br><?php
			echo $this->exploded . " is the exploded status"; ?><br><?php
		}
	}
?>




