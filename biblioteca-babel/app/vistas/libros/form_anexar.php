<h2>Introduce los datos del nuevo libro</h2>
<form id='form_anexar' method='post' action='?menu=libros&submenu=form_anexar_validar'>
	Título: <input type='text' id='titulo' name='titulo' maxsize='50' value='<?php echo \core\Datos::values('titulo', $datos) ?>'/><span class='requerio'>Requerido</span><?php echo \core\HTML_Tag::span_error('autor', $datos); ?><br />
	Autor: <input type='text' id='autor' name='autor' maxsize='50' value='<?php echo \core\Datos::values('autor', $datos) ?>'/><span class='requerio'>Requerido</span><?php echo \core\HTML_Tag::span_error('comentario', $datos); ?><br />
	Comentario: <input type='text' id='comentario' name='comentario' maxsize='50' value='<?php echo \core\Datos::values('comentario', $datos) ?>'/><?php echo \core\HTML_Tag::span_error('comentario', $datos); ?><br />	
	<input type='submit' value='enviar' />
	<input type='button' value='cancelar' onclick='window.location.assign("?menu=libros");'/>
</form>