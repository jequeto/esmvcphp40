<div id='impronta'>
	<p><?=\iText("Impronta de","principal")?>: <b><?php echo(str_replace("_", " ", substr($datos['file_name'], 0, stripos($datos['file_name'], "."))));?></b></p>
	<iframe id='iframe' src='<?=URL_APPLICATION_ROOT."visitantes/{$datos["file_name"]}"?>'>Lo sentimos, tu navegador no soporta iframes.</iframe>
	<br/>
	<button onclick='window.location.assign("<?php echo \core\URL::generar("visitantes/index"); ?>");'><?=\iText("Volver", "principal")?></button>
</div>


