<div>
	<h1>Listado de permisos</h1>
	
	<table border='1'>
		<thead>
			<tr>
				<th>Controlador</th>
				<th>Método</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($datos['filas'] as $fila)
			{
				echo "
					<tr>
						<td>{$fila['controlador']}</td>
						<td>{$fila['metodo']}</td>
						<td>
					".\core\HTML_Tag::a_boton("boton", array("permisos", "form_modificar", $fila['id']), "modificar")
//							<a class='boton' href='?menu={$datos['controlador_clase']}&submenu=form_modificar&id={$fila['id']}' >modificar</a>
					.\core\HTML_Tag::a_boton("boton", array("permisos", "form_borrar", $fila['id']), "borrar").
						"</td>
					</tr>
					";
			}
			echo "
				<tr>
					<td colspan='2'></td>
						<td>"
			.\core\HTML_Tag::a_boton("boton", array("permisos", "form_insertar"), "insertar").
					"</td>
				</tr>
			";
			?>
		</tbody>
	</table>
</div>