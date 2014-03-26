<?php
namespace modelos;

class permisos extends \core\Modelo_SQL {


	/* Rescritura de propiedades de validación */
	public static $validaciones_insert = array(
		'controlador' => 'errores_requerido && errores_identificador && errores_unicidad_insertar:controlador,metodo/metodos/controlador,metodo',
		'metodo' => 'errores_requerido && errores_identificador && errores_unicidad_insertar:controlador,metodo/metodos/controlador,metodo',
	);
	
	
	
	public static $validaciones_update = array(
		"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/roles/id",
		'controlador' => 'errores_requerido && errores_identificador && errores_unicidad_insertar:controlador,metodo/metodos/controlador,metodo',
		'metodo' => 'errores_requerido && errores_identificador && errores_unicidad_insertar:controlador,metodo/metodos/controlador,metodo',
	);
	

	
	public static $validaciones_delete = array(
		"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/roles/id"
	);
	
	
}