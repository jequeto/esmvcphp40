
<form method='post' name='<?php echo \core\Array_Datos::contenido("form_name", $datos); ?>' action="?menu=<?=\core\Distribuidor::get_controlador_instanciado()?>&submenu=<?php echo \core\Distribuidor::get_metodo_invocado(); ?>_validar" >
	
	<?php echo \core\HTML_Tag::form_registrar($datos["form_name"], "post"); ?>
	
	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	Controlador: <input id='controlador' name='controlador' type='text' size='50'  maxlength='50' value='<?php echo \core\Array_Datos::values('controlador', $datos); ?>'/>	<?php echo \core\HTML_Tag::span_error('controlador', $datos); ?>
	<br />
	Método: <input id='metodo' name='metodo' type='text' size='50'  maxlength='50' value='<?php echo \core\Array_Datos::values('metodo', $datos); ?>'/>	<?php echo \core\HTML_Tag::span_error('metodo', $datos); ?>
	<br />


	<br />
	<?php echo \core\HTML_Tag::span_error('errores_validacion', $datos); ?>
	
	<input type='submit' value='Enviar'/>
	<input type='reset' value='Limpiar'/>
	<button type='button' onclick='location.assign("<?php echo\core\URL::generar(\core\Distribuidor::get_controlador_instanciado()."/index"); ?>");'>Cancelar</button>
</form>
