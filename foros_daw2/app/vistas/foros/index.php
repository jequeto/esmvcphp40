<?php
/* Necesita $datos[foros] */
?>
<h1>Listado de foros del portal</h1>
<table class="table table-striped">
	<tr>
		<th>nombre</th><th>fecha alta</th><th>login</th>
	</tr>
<?php 
foreach ($datos["foros"] as $foro) {
	echo "<tr>"
	. "<td>{$foro["nombre"]}</td>"
	. "<td>{$foro["fecha_alta"]}</td>"
	. "<td>{$foro["login"]}</td>"
	. "</tr>";
}
?>
</table>