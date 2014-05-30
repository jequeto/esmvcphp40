
<form method='post' action="<?php echo \core\URL::generar(array(\core\Distribuidor::get_controlador_instanciado(), \core\Distribuidor::get_metodo_invocado()."_validar"))?>" enctype='multipart/form-data'  >

	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	
	<?=\core\HTML_Tag::errorSummary()?>
	<?=\core\HTML_Tag::errorSummary(array("errores" => array("inputName1" => "error description1", "inputName2" => "description error2" ) ))?>
	
	
	Nombre: <input id='nombre' name='nombre' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('nombre', $datos); ?>'/>
	<?php echo \core\HTML_Tag::span_error('nombre', $datos); ?>
	<br />
	
	Descripcion:<br />
	<textarea id='descripcion' name='descripcion' type='textarea' cols='100'  rows='10' ><?php echo \core\Array_Datos::values('descripcion', $datos); ?></textarea>
	<?php echo \core\HTML_Tag::span_error('descripcion', $datos); ?>
	<?=\core\HTML_Tag::inputText("dni")?>
	<?=\core\HTML_Tag::inputText("email",$datos, array("label"=>"Correo electrónico", "size" => "50"))?>
	
	<?php echo \core\HTML_Tag::span_error('errores_validacion', $datos); ?>
	
	<input type='submit' value='Enviar'>
	<input id='btn_reset' type='reset' value='Limpiar'>
	<button type='button' onclick='location.assign("<?php echo \core\URL::generar(\core\Distribuidor::get_controlador_instanciado()); ?>");'>Cancelar</button>
</form>

