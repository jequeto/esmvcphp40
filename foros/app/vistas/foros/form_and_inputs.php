
<form method='post' action="<?php echo \core\URL::generar(array(\core\Distribuidor::get_controlador_instanciado(), \core\Distribuidor::get_metodo_invocado()."_validar"))?>" enctype='multipart/form-data'  >

	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	
	Nombre: <input id='nombre' name='nombre' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('nombre', $datos); ?>'/>
	<?php echo \core\HTML_Tag::span_error('nombre', $datos); ?>
	<br />
	
	Descripcion:<br />
	<textarea id='descripcion' name='descripcion' type='textarea' cols='100'  rows='10' ><?php echo \core\Array_Datos::values('descripcion', $datos); ?></textarea>
	<?php echo \core\HTML_Tag::span_error('descripcion', $datos); ?>
	
	
	<?php echo \core\HTML_Tag::span_error('errores_validacion', $datos); ?>
	
	<input type='submit' value='Enviar'>
	<input type='reset' value='Limpiar'>
	<button type='button' onclick='location.assign("<?php echo \core\URL::generar(\core\Distribuidor::get_controlador_instanciado()); ?>");'>Cancelar</button>
</form>

