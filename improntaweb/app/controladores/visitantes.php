<?php
namespace controladores;


class visitantes extends \core\Controlador {
	
	
	/**
	 * Devuelve una vista con una tabla html conteniendo en cada fila un libro.
	 * 
	 * @param array $datos
	 */
	public function index(array $datos = array()) {
		
		$datos['visitantes'] = \modelos\visitantes::get_paginas();
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos, true);
		\core\HTTP_Respuesta::enviar($http_body);

	}
	
	
	public function pagina(array $datos = array()) {

		$validaciones = array(
			"id" => "errores_requerido",
			"p4" => "errores_requerido && errores_file_name",
		);
		
		if (\core\Validaciones::errores_validacion_request($validaciones, $datos)
			or ! \modelos\visitantes::existe_fichero($datos["values"]["p4"])	) {
			$datos["mensaje"] = "Error en el nombre del visitante.";
			$this->cargar_controlador("mensajes", "mensaje", $datos);
			return;
		}
		
				
		$datos["file_name"] = $datos["values"]["p4"]; // Para hacer su manejo más inteligible en la vista.
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos, true);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	

	
} // Fin de la clase