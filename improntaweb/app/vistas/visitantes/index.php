<div id='visitantes'>
	<h1><?=\iText("visitantes.index.h1" , "principal")?></h1>
	
	<table border='1px'>
		<thead>
			<tr>
				<th><?=\iText("Nombre","principal")?></th>
				<th><?=\iText("Fecha última modificación","principal")?></th>
				<th><?=\iText("Acciones","principal")?></th>
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
							<a href='".\core\URL::generar("visitantes/pagina/file/{$visitante['file_name']}")."' >".\iText("visitantes.index.action1","principal")."</a>
							<a href='".URL_APPLICATION_ROOT."visitantes/".$visitante['file_name']."' >".\iText("visitantes.index.action2","principal")."</a>
						</td>
					</tr>";
			}
			?>
		</tbody>		
	</table>
	<button onclick='window.location.assign("<?php echo \core\URL::generar("inicio"); ?>");'><?=\iText("Volver","principal")?></button>
</div>