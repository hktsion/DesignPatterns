<?php

class FactoriaInterna extends AbstractFactory{

	function getExterior($tipo_exterior){ return null; }
	
	function getInterior($tipo_interior){
		
		if($tipo_interior == null){ return null;}

		switch ($tipo_interior) {
			case  'MUE': return new Muelle(); break;
			case  'ESP': return new Espuma();
			default: break;
		}
	}
}