<?php
namespace modelos;

/**
 * Description of visitantes
 *
 * @author jequeto
 */
class visitantes extends \core\Modelo_SQL {
	
	
	
	/**
	 * Recupera de la carpeta /visitantes/ los ficheros que contienen las páginas que
	 * han escrito los visitantes del taller.
	 * 
	 * @return array array(array("name"=>"nombre_ape1_ape2.php","last_update_time"=>"d/m/Y H:i:s"), ...)
	 */
	public static function get_paginas() {
		
		$subdirectorio = PATH_APPLICATION."visitantes";

		$ficheros = array();
		
		if ($dh = opendir($subdirectorio)){
			while (($file = readdir($dh)) !== false){
//				echo "filename:" . $file . "<br>";
				if (is_file($subdirectorio."/$file")) {
					if ($file != "." and $file != "..") {
						array_push($ficheros, array("file_name" => $file, "last_update_time"=> date("d/m/Y H:i:s.", filemtime($subdirectorio."/$file"))));	
					}
				}
			}

			closedir($dh);
		}

		return $ficheros;
		
	}
	
	public static function existe_fichero($file_name) {

		return(is_file(PATH_APPLICATION."visitantes/$file_name"));
		
	}

} // Fin de la clase