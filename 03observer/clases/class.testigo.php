<?php

class Testigo implements \SplObserver{

	public function update(\Splsubject $splsubject){

		$datos = '';

		if($splsubject->temperatura > $splsubject::ALERTA_TEMP){
			$datos = '<br>Hay un aumento excesivo en la temperatura del motor.';
		}

		if($splsubject->nivel_aceite < $splsubject::ALERTA_ACEITE){
			$datos.='<br>El nivel de aceite es muy bajo.';
		}

		if($splsubject->presion_ruedas < $splsubject::ALERTA_RUEDAS){
			$datos.='<br>La presión de las ruedas es muy baja.';
		}

		echo $datos;
	}
}

?>