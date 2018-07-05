<?php

class GeneradorFactorias{

	static function getFactoria($tipo_factoria){
		if($tipo_factoria == null){ return null; }

		if($tipo_factoria == 'EXT'){ return new FactoriaExterna(); }
		if($tipo_factoria == 'INT'){ return new FactoriaInterna(); }

		return null;
	}
}
