<?php 

class Taller implements \SplObserver{
	public function update(\Splsubject $splsubject){
		echo '<br>Enviando notificación al taller ante una posible avería.';
	}
}

