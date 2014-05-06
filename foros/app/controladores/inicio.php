<?php
namespace controladores;


class inicio extends \core\Controlador {
	
	

	public function index(array $datos = array()) {
		
		header("Location: ".\core\URL::generar("foros"));
		
	}
	
	
} // Fin de la clase