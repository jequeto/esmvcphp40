<?php
namespace controladores;


class foros extends \core\Controlador {
	
	
	
	public function pagina_estatica(array $datos = array()) {

		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('DEFAULT', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
//		\core\HTTP_Respuesta::enviar("<html><body>Estático</body></html>");
		
	}
	
	
	public function index(array $datos = array()) {
		
//		$datos['foros'] = \modelos\Modelo_SQL::table("v_foros_usuarios_creadores")->select();
		$datos['foros'] = \modelos\Foros::v_foros_usuarios_creadores();
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('DEFAULT', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	
	/**
	 * Muestra una vista con el formulario para anexar un libro.
	 * 
	 * @param array $datos
	 */
	public function form_anexar(array $datos = array()) {
			
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
		$http_body = \core\Vista_Plantilla::generar('DEFAULT', $datos, true);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	
	
	public function form_anexar_validar(array $datos = array()) {
		

		
		$validaciones = array(
			"nombre" => "errores_requerido && errores_texto",
			"descripcion" => "errores_texto",
		);
		
		$validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos);
		if (! $validacion) {
			\core\Distribuidor::cargar_controlador("foros", "form_anexar", $datos);
		}
		else {
			$foro = $datos['values']; //Valores de los input que han sido validados
			$foro["fecha_creacion"] = date("Y-m-d");
			$foro["usuario_id"] = \core\Usuario::$id;
			\modelos\Foros::tabla("foros")->insert($foro);
			$_SESSION["alerta"] = "Se han anexado correctamente los datos.";
			\core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("foros/index"));
			\core\HTTP_Respuesta::enviar();
		}
		
	}
	
	
	/**
	 * Muestra una vista con un formulario conteniendo los datos del libro
	 * que se quiere modificar. El id del libro se recibe por get.
	 * 
	 * @param array $datos
	 */
	public function form_modificar(array $datos = array()) {
		
		$validacion = true;

		if ( ! isset($datos['errores'])) {
			// Recuperamos datos del libro del fichero de texto solo si no vienen datos del libro junto con los errores de validación.
			$validaciones = array(
				"id" => "errores_requerido && errores_numero_entero_positivo",
			);
		
			$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);
			if ( $validacion) {
				$id = $datos['values']['id'];
				$clausulas["where"] = "id = $id ";
				$datos['values'] = \modelos\Modelo_SQL::select($clausulas, "foros");
			}
		}
		if ($validacion) {
			$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
			
		}
		else {
			$datos = array(
				"mensaje" => "No se ha podido identificar el id del foro a modificar."
			);
			$datos['view_content'] = \core\Vista::generar("errores/mensaje", $datos, true);
		}
		
		$http_body = \core\Vista_Plantilla::generar('DEFAULT', $datos, true);
		\core\HTTP_Respuesta::enviar($http_body);
		
		
	}
		
	
	
	public function form_modificar_validar(array $datos = array()) {
		
///		$libro = \core\HTTP_Requerimiento::post(); // Ahora los datos recibidos del formulario los recoge el metodo \core\Validaciones::errores_validacion_request($validaciones, $datos) y los deja almacenados en un array en $datos[values], pues $datos se pasa por referencia.

		
		//print_r($_POST); print_r($libro); exit(0);
		
		$validaciones = array(
			"id" => "errores_requerido && errores_numero_entero_positivo",
			"titulo" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
			"autor" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma ",
			"comentario" => "errores_texto && errores_prohibido_punto_y_coma",
		
		);
		
		$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);
		if (! $validacion) {
		    if (isset($datos['errores']['id'])) {
				$datos['errores']['validacion'] = "No es posible identificar el id del libro a modificar.<br />". $datos['errores']['validacion'];
			}
			print "-- Depuración: \$datos= "; print_r($datos);
			\core\Distribuidor::cargar_controlador("libros", "form_modificar", $datos);
		}
		else {
			$libro = $datos['values']; //Valores de los input que han sido validados
			\modelos\Libros_En_Fichero::modificar_libro($libro);
			$_SESSION["alerta"] = "Se han modificado correctamente los datos.";
//			\modelos\Libros_En_Fichero::modificar_libro($datos['values']);
//			\core\Distribuidor::cargar_controlador("libros", "index");

			\core\HTTP_Respuesta::set_header_line("location", "?menu=libros&submenu=index");
			\core\HTTP_Respuesta::enviar();
			
		}
		
	}
	
	
	/**
	 * Muestra una vista con un formulario de solo lectura conteniendo los datos del libro
	 * que se quiere borrar. El id del libro se recibe por get.
	 * 
	 * @param array $datos
	 */
	public function form_borrar(array $datos = array()) {
		
		$validacion = true;

		if ( ! isset($datos['errores'])) {
			// Recuperamos datos del libro del fichero de texto solo si no vienen datos del libro junto con los errores de validación.
			$validaciones = array(
				"id" => "errores_requerido && errores_numero_entero_positivo",
			);
		
			$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);
			if ( $validacion) {
				$id = $datos['values']['id'];
				$datos['values'] = \modelos\Libros_En_Fichero::get_libros($id); // Esta línea crea de nuevo el contenido del la entrada ['values'] y se pierde los que estuviera almacenado antes. Por eso hay que volver a generar la entrada [values][id]
				$datos['values']['id'] = $id;
			}
		}
		if ($validacion) {
			$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
			
		}
		else {
			$datos = array(
				"mensaje" => "No se ha podido identificar el id del libro a borrar.",
				"url_continuar" =>"?menu=libros&sumbenu=index",
			);
			$datos['view_content'] = \core\Vista::generar("errores/mensaje", $datos, true);
		}
		
		$http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	
	
	
	public function form_borrar_validar(array $datos = array()) {
		
//		$libro = \core\HTTP_Requerimiento::post(); // Ahora los datos recibidos del formulario los recoge el metodo \core\Validaciones::errores_validacion_request($validaciones, $datos) y los deja almacenados en un array en $datos[values], pues $datos se pasa por referencia.

		
		// print_r($_POST); print_r($libro); exit(0);
		
		$validaciones = array(
			"id" => "errores_requerido && errores_numero_entero_positivo",
			// La siguientes reglas no son necesarias porque el formulario form_borrar es de solo lectura y los datos no se modificarán
			
			//"titulo" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
			//"autor" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
			//"comentario" => "errores_texto && errores_prohibido_punto_y_coma",
		
		);
		
		$validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos);
		if (! $validacion) {
			$datos['errores']['validacion'] = 'Error al identificar el id del libro a borrar.' . $datos['errores']['validacion'];
			print "-- Depuración: \$datos= "; print_r($datos);
			\core\Distribuidor::cargar_controlador("libros", "form_borrar", $datos);
		}
		else {
			$libro = $datos["values"]; // Los datos del libro están recogidos por la validación en $datos[values]
			print "-- Depuración: \$datos= "; print_r($datos);
			\modelos\Libros_En_Fichero::borrar_libro($libro['id']);
			$_SESSION["alerta"] = "Se han borrado correctamente los datos.";
//			\modelos\Libros_En_Fichero::borrar_libro($datos["values"]['id']);

			//		\core\Distribuidor::cargar_controlador("libros", "index");
			\core\HTTP_Respuesta::set_header_line("location", "?menu=libros&submenu=index");
			\core\HTTP_Respuesta::enviar();
		}
	}
	
	
	
} // Fin de la clase