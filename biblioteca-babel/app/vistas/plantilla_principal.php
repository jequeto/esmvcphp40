<!DOCTYPE html>
<html lang='<?php echo \core\Idioma::get(); ?>' >
	<head>
		<title><?php echo \core\Idioma::text("title", "plantilla_internacional"); ?></title>
		<meta name="Description" content="Explicaci�n de la p�gina" /> 
		<meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
		<meta name="Generator" content="con qué se ha hecho" /> 
	 	<meta name="Origen" content="Quíen lo ha hecho" /> 
		<meta name="Author" content="nombre del autor" /> 
		<meta name="Locality" content="Madrid, Espa�a" /> 
		<meta name="Lang" content="<?php echo \core\Idioma::get(); ?>" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 
		<meta http-equiv="Content-Language" content="<?php echo \core\Idioma::get(); ?>"/>
		
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="favicon.ico" rel="icon" type="image/x-icon" /> 
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/principal.css" />
		<style type="text/css" >
			/* Definiciones hoja de estilos interna */
		</style>

		<script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/f_cookies_v06.js"></script>
		<script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/idiomas.js"></script>
		
		<script type="text/javascript" >
			
			function saludo() {
				alert('<?php echo \core\Idioma::text("saludo1", "plantilla_internacional"); ?>');
			}
		</script>
		
	</head>

	<body>
	
		<!-- Contenido que se visualizar� en el navegador, organizado con la ayuda de etiquetas html -->
		<div id="inicio"></div>
		<div id="encabezado">
			<img src="<?php echo URL_ROOT; ?>recursos/imagenes/ipv_ies_palomeras.png" alt="logo" title="Logo" onclick="window.location.assign('http://www.iespalomeras.net/');"/>
			<img src="<?php echo URL_ROOT; ?>recursos/imagenes/departamento_informatica.png" alt="logo" title="Logo departamento"  onclick="window.location.assign('http://www.iespalomeras.net/index.php?option=com_wrapper&view=wrapper&Itemid=86');" />
			<h1 id="titulo"><?php echo \core\Idioma::text("h1#titulo", "plantilla_internacional"); ?></h1>
		</div>
		<div id='idiomas' style='position: fixed; top: 10px; right: 10px; width: 200px;'>
			<span  onclick='set_lang("es", "<?php echo \core\URL::generar(array(\core\Distribuidor::get_controlador_instanciado(), \core\Distribuidor::get_metodo_invocado()), "es"); ?>");' ><img src='<?php echo \core\URL::generar_sin_idioma(); ?>recursos/imagenes/generales/flag_es.png' height='25px' /><?php echo \core\Idioma::text("Español", "plantilla_internacional"); ?></span>
			<a  onclick='set_lang("en", "<?php echo \core\URL::generar(array(\core\Distribuidor::get_controlador_instanciado(), \core\Distribuidor::get_metodo_invocado()), "en"); ?>");'><img src='<?php echo \core\URL::generar_sin_idioma(); ?>recursos/imagenes/generales/flag_gb.png' height='25px' /><?php echo \core\Idioma::text("Inglés", "plantilla_internacional"); ?></a>
		</div>
		
		<div id="div_menu" >
			<fieldset>
				<legend><?php echo \core\Idioma::text("leyenda_menu", "plantilla_internacional"); ?>:</legend>
					<ul id="menu" class="menu">
						<li class="item"><a href="<?php echo \core\URL::generar("inicio"); ?>" title="Inicio"><?php echo \core\Idioma::text("Inicio", "plantilla_internacional"); ?></a></li>
						<li class="item"><a href="<?php echo \core\URL::generar("libros"); ?>" title="Libros leídos"><?php echo \core\Idioma::text("Libros", "plantilla_internacional"); ?></a></li>
					</ul>
			</fieldset>
		</div>

		<div id="view_content">
			
			<?php
				echo \core\Datos::contenido("view_content", $datos);
			?>
			
		</div>
	
		<div id="pie">
			<hr />
		
			<?php echo \core\Idioma::text("Autor", "plantilla_internacional"); ?>: Jesús María de Quevedo Tomé. <b><span title='jequeto@gmail.com'><?php echo \core\Idioma::text("Contactar", "plantilla_internacional"); ?>: <img src='<?php echo \core\URL::generar_sin_idioma(); ?>recursos/imagenes/generales/email.png' height='25px' /></span></b><br />
			<?php echo \core\Idioma::text("Fecha última actualización", "plantilla_internacional"); ?>: 5/12/2013.
		</div>
		
		<div id='globals'>
			<?php
				print "<pre>"; print_r($GLOBALS);print "</pre>";
			?>
		</div>
		
	</body>

</html>
