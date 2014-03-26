<?php
namespace controladores;

class permisos extends \core\Controlador {

	
	
	/**
	 * Presenta una <table> con las filas de la tabla con igual nombre que la clase.
	 * @param array $datos
	 */
	public function index(array $datos=array()) {
		
		$clausulas['order_by'] = 'controlador, metodo';
		//$datos["filas"] = \modelos\roles::select($clausulas, "metodos"); // Recupera todas las filas ordenadas
		$datos["filas"] = \modelos\Modelo_SQL::table("metodos")->select($clausulas); // Recupera todas las filas ordenadas
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	
	
	public function form_insertar(array $datos=array()) {
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}

	
	
	
	public function form_insertar_validar(array $datos=array()) {
		
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request(\modelos\roles::$validaciones_insert, $datos))
            $datos["errores"]["errores_validacion"] = "Corrige los errores.";
		else {
			
			if ( ! $validacion = \modelos\Modelo_SQL::table("metodos")->insert($datos["values"]) ) // Devuelve true o false
				$datos["errores"]["errores_validacion"]="No se han podido grabar los datos en la bd.";
		}
		if ( ! $validacion) //Devolvemos el formulario para que lo intente corregir de nuevo
			\core\Distribuidor::cargar_controlador('roles', 'form_insertar', $datos);
		else
		{
			// Se ha grabado la modificación. Devolvemos el control al la situacion anterior a la petición del form_modificar
			//$datos = array("alerta" => "Se han grabado correctamente los detalles");
			// Definir el controlador que responderá después de la inserción
			//\core\Distribuidor::cargar_controlador('roles', 'index', $datos);
			$_SESSION["alerta"] = "Se han grabado correctamente la inserción";
			//header("Location: ".\core\URL::generar("roles/index"));
			\core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("permisos/index"));
			\core\HTTP_Respuesta::enviar();
		}
	}

	
	
	public function form_modificar(array $datos = array()) {
		
		
		if ( ! isset($datos["errores"])) { // Si no es un reenvío desde una validación fallida
			$validaciones=array(
				"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/roles/id"
			);
			if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
				$datos['mensaje'] = 'Datos erróneos para identificar el objeto a modificar';
				\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
				return;
			}
			else {
				$clausulas['where'] = " id = {$datos['values']['id']} ";
				if ( ! $filas = \modelos\Modelo_SQL::table("metodos")->select( $clausulas)) {
					$datos['mensaje'] = 'Error al recuperar la fila de la base de datos';
					\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
					return;
				}
				else {
					$datos['values'] = $filas[0];
					
				}
			}
		}
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}

	
	
	
	
	public function form_modificar_validar(array $datos=array()) {	
		
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request(\modelos \roles::$validaciones_update, $datos)) {
			
            $datos["errores"]["errores_validacion"] = "Corrige los errores.";
		}
		else {
			
			if ( ! $validacion = \modelos\Modelo_SQL::table("metodos")->update($datos["values"])) // Devuelve true o false
					
				$datos["errores"]["errores_validacion"] = "No se han podido grabar los datos en la bd.";
				
		}
		if ( ! $validacion) //Devolvemos el formulario para que lo intente corregir de nuevo
			\core\Distribuidor::cargar_controlador('permisos', 'form_modificar', $datos);
		else {
			$_SESSION["alerta"] = "Se ha modificado correctamente la modificación";
			//header("Location: ".\core\URL::generar("roles/index"));
			\core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("permisos/index"));
			\core\HTTP_Respuesta::enviar();
		}
		
	}

	
	
	public function form_borrar(array $datos=array()) {
		
		$validaciones=array(
			"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/roles/id"
		);
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			$datos['mensaje'] = 'Datos erróneos para identificar el objeto a borrar';
			
			\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
			return;
		}
		else {
			$clausulas['where'] = " id = {$datos['values']['id']} ";
			if ( ! $filas = \modelos\Modelo_SQL::table("metodos")->select( $clausulas)) {
				$datos['mensaje'] = 'Error al recuperar la fila de la base de datos';
				\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
				return;
			}
			else {
				$datos['values'] = $filas[0];
			}
		}
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar("DEFAULT", $datos);
		\core\HTTP_Respuesta::enviar($http_body);
	}

	
	
	
	
	
	public function form_borrar_validar(array $datos=array()) {	
		
		$validaciones=array(
			 "id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/roles/id"
		);
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			$datos['mensaje'] = 'Datos erróneos para identificar el rol a borrar';
			\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
			return;
		}
		else
		{
			if ( ! $validacion = \modelos\Modelo_SQL::table("metodos")->delete($datos["values"])) {// Devuelve true o false
				$datos['mensaje'] = 'Error al borrar en la bd';
				\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
				return;
			}
			else {
				$_SESSION["alerta"] = "Se ha borrado correctamente el objeto";
				//header("Location: ".\core\URL::generar("roles/index"));
				\core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("permisos/index"));
				\core\HTTP_Respuesta::enviar();
			}
		}
		
	}
	
} // End of the class