<?php

class Coche implements \SplSubject{

	private $observers;
	private $niveles;
	const ALERTA_TEMP = 80;
	const ALERTA_RUEDAS = 1.7;
	const ALERTA_ACEITE = 10;

	public function __construct($niveles){
		$this->temperatura  = $niveles['temperatura'];
		$this->nivel_aceite = $niveles['aceite'];
		$this->presion_ruedas = $niveles['ruedas'];
		$this->observers = array();
	}

	public function setNiveles($newNiveles){
		$this->temperatura = $newNiveles['temperatura'];
		$this->nivel_aceite = $newNiveles['aceite'];
		$this->presion_ruedas = $newNiveles['ruedas'];
	}

	public function getNiveles(){
		if($this->temperatura > self::ALERTA_TEMP 
			|| $this->nivel_aceite < self::ALERTA_ACEITE
			|| $this->presion_ruedas < self::ALERTA_RUEDAS
		){
			$this->notify();
			return;
		}
		return null;
	}

	public function attach(\SplObserver $splObserver){
		$idObserver = spl_object_hash($splObserver);
		$this->observers[$idObserver] = $splObserver;
	}

	public function detach(\SplObserver $splObserver){
		$idObserver = spl_object_hash($splObserver);
		if(isset($this->observers[$idObserver])){
			unset($this->observers[$idObserver]);
		}
	}

	public function notify(){ 
		foreach ($this->observers as $observer) {
			$observer->update($this);
		}
	}
}