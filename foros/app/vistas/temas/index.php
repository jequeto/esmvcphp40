<h1>Listado de temas del foro <?=$datos["foro"]["nombre"]?></h1>
<table class="table table-striped">
	<tr>
		<th>nombre</th><th>fecha alta</th><th>login</th><th>acciones</th>
	</tr>
<?php 
if (count($datos["temas"])) {
	foreach ($datos["temas"] as $tema) {
		echo "<tr>"
		. "<td><a href='".\core\URL::generar("mensajes/index/{$tema["id"]}")."'>{$tema["nombre"]}</a></td>"
		. "<td>{$tema["fecha_creacion"]}</td>"
		. "<td>{$tema["usuario_id"]}</td>"
		. "<td>"
				. "<a class='btn btn-warning' href='".core\URL::generar("temas/form_modificar/{$tema["id"]}")."'>Modificar</a>"
				. "<a class='btn btn-danger' href='".core\URL::generar("temas/form_borrar/{$tema["id"]}")."'>Borrar</a>"
		. "</td>"
		. "</tr>";
	}
}
else {
	echo "<tr><td colspan='4'>No hay temas actualmente</td></tr>";
}
?>
</table>
<a class="btn btn-primary" href="<?=\core\URL::generar("temas/form_anexar")?>">Insertar</a>