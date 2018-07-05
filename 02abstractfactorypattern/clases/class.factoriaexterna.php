<?php

class FactoriaExterna extends AbstractFactory{

	function getInterior($tipo_interior){ return null; }
	
	function getExterior($tipo_exterior){
		if($tipo_exterior == null){ return null;}
		
		switch ($tipo_exterior) {
			case  'FIB': return new Fibra(); break;
			case  'VIS': return new Visco();
			default: break;
		}
	}
}