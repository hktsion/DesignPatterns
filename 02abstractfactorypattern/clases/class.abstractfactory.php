<?php

abstract class AbstractFactory{

	abstract function getExterior($tipo_exterior);
	abstract function getInterior($tipo_interior);
}