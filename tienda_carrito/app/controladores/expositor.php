<?php
namespace controladores;

class expositor extends \core\Controlador {

	
	public function index(array $datos=array()) {
		
		$this->categoria($datos);
		
	}
	
	/**
	 * Presenta una <table> con las filas de la tabla con igual nombre que la clase.
	 * @param array $datos
	 */
	public function categoria(array $datos=array()) {
		$validaciones = array(
			"p4" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:p4/categorias/id",
			"p5" => "errores_lista_valores:(nombre;precio)"
		);
		if ( $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			$clausulas['where'] = "categoria_id = {$datos["values"]["p4"]}";
			$clausulas['order_by'] = $datos["values"]["p5"] ? "{$datos["values"]["p5"]}" : "";
			$datos["filas"] = \modelos\Datos_SQL::table("v_articulos")->select( $clausulas ); // Recupera todas las filas ordenadas
			
			$_SESSION["expositor_actual"] = \core\URL::actual();
			
			$datos["categoria_id"] = $datos["values"]["p4"];
			
			$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
			
			if (isset($_POST["is_ajax"])) {
				echo $datos["view_content"];
			}
			else {
				$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
				\core\HTTP_Respuesta::enviar($http_body);
			}
		}
		else {
			if (isset($_POST["is_ajax"])) {
				$this->cargar_controlador("categorias", "recuento_articulos_ajax", $datos);
			}
			else {
				$this->cargar_controlador("inicio", "index");
			}
		}
		
	}
	
	
	
	
	public function categoria_ajax(array $datos=array()) {
		$validaciones = array(
			"p4" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:p4/categorias/id",
			"p5" => "errores_lista_valores:(nombre;precio)"
		);
		if ( $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			$clausulas['where'] = "categoria_id = {$datos["values"]["p4"]}";
			$clausulas['order_by'] = $datos["values"]["p5"] ? "{$datos["values"]["p5"]}" : "";
			$datos["filas"] = \modelos\Datos_SQL::table("v_articulos")->select( $clausulas ); // Recupera todas las filas ordenadas
			
			$_SESSION["expositor_actual"] = \core\URL::actual();
			
			$datos["categoria_id"] = $datos["values"]["p4"];
			
			$datos['view_content'] = \core\Vista::generar("categoria_ajax", $datos);
			
			if (isset($_POST["is_ajax"])) {
				echo $datos["view_content"];
			}
			else {
				$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
				\core\HTTP_Respuesta::enviar($http_body);
			}
		}
		else {
			if (isset($_POST["is_ajax"])) {
				$this->cargar_controlador("categorias", "recuento_articulos_ajax", $datos);
			}
			else {
				$this->cargar_controlador("inicio", "index");
			}
		}
		
	}
	
	
	
	
} // Fin de la clase