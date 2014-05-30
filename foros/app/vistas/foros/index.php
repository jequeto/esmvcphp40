<?php
/* Necesita $datos[foros] */
?>
<h1>Listado de foros del portal</h1>
<table class="table table-striped">
	<tr>
		<th>nombre</th><th>fecha alta</th><th>login</th><th>acciones</th>
	</tr>
<?php 
if (count($datos["foros"])) {
	foreach ($datos["foros"] as $foro) {
		echo "<tr>"
		. "<td><a href='".\core\URL::generar("temas/index/{$foro["id"]}")."'>{$foro["nombre"]}</a></td>"
		. "<td>{$foro["fecha_creacion"]}</td>"
		. "<td>{$foro["login"]}</td>"
		. "<td>"
				. "<a class='btn btn-warning' href='".core\URL::generar("foros/form_modificar/{$foro["id"]}")."'>Modificar</a>"
				. "<a class='btn btn-danger' href='".core\URL::generar("foros/form_borrar/{$foro["id"]}")."'>Borrar</a>"
		. "</td>"
		. "</tr>";
	}
}
else {
	echo "<tr><td colspan='4'>No hay foros actualmente</td></tr>";
}
?>
</table>
<a class="btn btn-primary" href="<?=\core\URL::generar("foros/form_anexar")?>">Insertar</a>