<ul id="menu" class="menu">
	<li id='item' class='item'><a onclick="cargar_view_content('<?php echo \core\URL::generar("categorias/recuento_articulos_ajax"); ?>');" title='Inicio'>Inicio</a></li>
	<?php
		foreach ($datos ["filas"] as $categoria) {
//			echo "<li class='item'><a href='".\core\URL::generar("expositor/categoria/{$categoria["id"]}")."' title='{$categoria["nombre"]}'>{$categoria["nombre"]}</a></li>\n";
			echo "<li id='item{$categoria["id"]}' class='item'><a onclick='cargar_view_content(\"".\core\URL::generar("expositor/categoria_ajax/{$categoria["nombre"]}/{$categoria["id"]}")."\");'  title='{$categoria["nombre"]}'>{$categoria["nombre"]}</a></li>\n";
			
		}
	?>
</ul>