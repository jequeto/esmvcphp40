<div id='visitantes'>
	<h1><?=\iText("visitantes.index.h1","plantilla_internacional")?></h1>
	
	<table border='1px'>
		<thead>
			<tr>
				<th><?=\iText("Nombre","plantilla_internacional")?></th>
				<th><?=\iText("Fecha última modificación","plantilla_internacional")?></th>
				<th><?=\iText("Acciones","plantilla_internacional")?></th>
			</tr>
		</thead>
		<tbody>
			<?php
		
			foreach ($datos['visitantes'] as $id => $visitante) {
				
				$nombre = (str_replace("_", " ", substr($visitante['file_name'], 0, stripos($visitante['file_name'], "."))));
				echo "<tr>
						<td>$nombre</td>
						<td>{$visitante['last_update_time']}</td>
						<td>
							<a href='".\core\URL::generar("visitantes/pagina/file/{$visitante['file_name']}")."' >".\iText("visitantes.index.action1","plantilla_internacional")."</a>
							<a href='".URL_APPLICATION_ROOT."visitantes/".$visitante['file_name']."' >".\iText("visitantes.index.action2","plantilla_internacional")."</a>
						</td>
					</tr>";
			}
			?>
		</tbody>		
	</table>
	<button onclick='window.location.assign("<?php echo \core\URL::generar("inicio"); ?>");'><?=\iText("Volver","plantilla_internacional")?></button>
</div>