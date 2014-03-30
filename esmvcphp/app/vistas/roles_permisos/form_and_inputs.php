
<form method='post' name='<?php echo \core\Array_Datos::contenido("form_name", $datos); ?>' action="?menu=<?php echo \core\Distribuidor::get_controlador_instanciado(); ?>&submenu=form_modificar_validar" >
		
	<input id='rol' name='rol' type='hidden' value='<?php echo \core\Array_Datos::contenido('rol', $datos); ?>' />
	<button id='btn_checked_all' type='button' onclick='chequear_todo();'>Seleccionar todo</button><br />
	<table class='resultados'>
		<tr><th>Otorgado</th><th>Permiso</th></tr>
	<?php 
		$i = 0;
		foreach ($datos["filas"] as $fila) {
			$fila_clase = ($i % 2) ? "fila_impar" : "fila_par";
			$checked = ($fila["rol"]) ? " checked='checked' " : "";
			echo "<tr class='$fila_clase'><td><input type='checkbox' $checked name='permiso$i' value='{$fila["controlador"]},{$fila["metodo"]}' /></td><td>{$fila["controlador"]}::{$fila["metodo"]}</td></tr>\n";
			$i++;
		}
	?>
	</table>	
	<input type='submit' value='Enviar'/>
	<input type='reset' value='Limpiar'/>
	<button type='button' onclick='location.assign("<?php echo\core\URL::generar("roles/index"); ?>");'>Cancelar</button>
</form>
