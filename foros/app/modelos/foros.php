<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace modelos;

/**
 * Description of foros
 *
 * @author jequeto
 */
class Foros extends \core\Modelo_SQL {
	
	public static function v_foros_usuarios_creadores() {
		
		$sql = "
select f.*, u.login
from ".self::get_prefix_tabla("foros")." f left join ".self::get_prefix_tabla("usuarios")." u
on f.usuario_id = u.id
;";
		return self::execute($sql);
	}
	
}
