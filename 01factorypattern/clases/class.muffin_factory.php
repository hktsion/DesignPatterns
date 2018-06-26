<?php

class MuffinFactory{

	function __construct($tm){
		$this->tipo_muffin = $tm;
	}

	function getMuffin(){
		switch ($this->tipo_muffin) {
			case 'ARND': return new Arandanos();
			case 'CHOC': return new Chocolate();
			default: return null; 
		}
	}

}

?>


