<!DOCTYPE HTML>
<html lang='<?php echo \core\Idioma::get(); ?>'>
	<head>
		<title><?php echo \core\Idioma::text("title", "plantilla_internacional"); ?></title>
		<meta name="Description" content="Explicación de la página" /> 
		<meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
		<meta name="Generator" content="esmvcphp framewrok" /> 
	 	<meta name="Origen" content="esmvcphp framework" /> 
		<meta name="Author" content="Jesús María de Quevedo Tomé" /> 
		<meta name="Locality" content="Madrid, España" /> 
		<meta name="Lang" content="<?php echo \core\Idioma::get(); ?>" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" /> 
		<meta http-equiv="Content-Language" content="<?php echo \core\Idioma::get(); ?>"/>
	
<!--		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="favicon.ico" rel="icon" type="image/x-icon" /> -->
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/principal.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/carrito.css" />
		<style type="text/css" >
			/* Definiciones hoja de estilos interna */
			
		</style>
		
		
		<script type='text/javascript' src="<?php echo URL_ROOT."recursos/js/jquery/jquery-1.10.2.min.js"; ?>" ></script>
		<script type='text/javascript' src="<?php echo URL_ROOT."recursos/js/general.js"; ?>" ></script>
		<script type='text/javascript' src="<?php echo URL_ESMVCPHP_ROOT; ?>recursos/js/sesion.js" ></script>
		<script type="text/javascript" src=""></script>
		
		<script type="text/javascript" >
			/* líneas del script */
			<?php /* echo $datos["js_internal"]; */?>
			/* Gestión de la sesión */

			var sesion_ms_inactivo = 0;
			var sesion_ms_desde_conexion = <?php  echo \core\Usuario::$sesion_segundos_duracion * 1000; ?> ;
		</script>
		
	</head>

	<body onload='onload();'>
	
		<!-- Contenido que se visualizará en el navegador, organizado con la ayuda de etiquetas html -->
		<div id="inicio"></div>
		<div id="encabezado">
			<img src="<?php echo URL_ROOT; ?>recursos/imagenes/ipv_ies_palomeras.png" alt="logo" title="Logo" onclick="window.location.assign('http://www.iespalomeras.net/');"/>
			<img src="<?php echo URL_ROOT; ?>recursos/imagenes/departamento_informatica.png" alt="logo" title="Logo departamento"  onclick="window.location.assign('http://www.iespalomeras.net/index.php?option=com_wrapper&view=wrapper&Itemid=86');" />
			<h1 id="titulo">Tienda Carrito</h1>
		</div>
		
		<div id="div_derecha_logo">
			Usuario: 
			<?php 
			echo "<b>".\core\Usuario::$login."</b>";
			if (\core\Usuario::$login != 'anonimo') {
				echo " <a href='".\core\URL::generar("usuarios/desconectar")."'>Desconectar</a>";
			}
			else {
				if ((\core\Usuario::$login == "anonimo") && ! (\core\Distribuidor::get_controlador_instanciado() == "usuarios" && \core\Distribuidor::get_metodo_invocado() == "form_login")) {
					echo " <a href='".\core\URL::generar("usuarios/form_login")."'>Conectar</a>";
				}
				if ((\core\Usuario::$login == "anonimo") && ! (\core\Distribuidor::get_controlador_instanciado() == "usuarios" && \core\Distribuidor::get_metodo_invocado() == "form_insertar_externo")) {
					echo " <a href='".\core\URL::generar("usuarios/form_insertar_externo")."'>Regístrate</a>";
				}
			}
			echo "<br />Fecha local: <span id='fecha'></span>";
			echo "<br />Tiempo desde conexión: <span id='tiempo_desde_conexion'>".gmdate('H:i:s',  \core\Usuario::$sesion_segundos_duracion)."</span>";
			echo "<br />Tiempo inactivo: <span id='tiempo_inactivo'></span>";	
			?>
		</div>
		
		<div id="div_menu" >
			<fieldset>
				<legend>Menú - Índice - Barra de navegación:</legend>
					<?php 
						echo self::incluir("menu", "index");
//						 echo $datos["carrito"];
					?>
				
					<form method='post' action='<?php echo \core\URL::generar("articulos/form_buscar_validar"); ?>' style='float: left; width: 250px; border: 1px solid blue; margin-left: 5px;' onsubmit='return(document.getElementById("buscar_nombre").value.length>0);'>
						<input type="text" id='buscar_nombre' name='nombre' />
						<input type='submit' value='Buscar' />
					</form>
			
				<div id='carrito'>
					<?php echo self::incluir("carrito", "ver");
						 // echo $datos["carrito"];
					?>
				</div>
			</fieldset>
		</div>
		
		<div id="sendero_migas_pan">
			<?php echo \controladores\sendero::ver(); ?>
		</div>

		<div id="view_content">
			
			<?php
				echo \core\Array_Datos::contenido("view_content", $datos);
			?>
			
		</div>

	
		<div id="pie">
			
			Pie del documento.<br />
			Documento creado por Jesús María de Quevedo Tomé. <a href="mailto:jequeto@gmail.com">Contactar</a><br />
			Fecha última actualización: 15 de diciembre de 2013.
		</div>
		
		<?php echo \core\HTML_Tag::post_request_form(); ?>
		
		
		<script type="text/javascript" />
			var alerta;
			function onload() {
				
				actualizar_tiempos(); /* Se ejecuta en el segundo = */
				var relojes_sesion = setInterval(function(){actualizar_tiempos()}, 1000); /* Se ejecuta en el segudo 1 y siguientes */
				
				visualizar_alerta();
				
			}

			function visualizar_alerta() {
				if (alerta != undefined) {
					$("body").css("opacity","0.3").css("filter", "alpha(opacity=30)");
					alert(alerta);
					alerta = undefined;
					$("body").css("opacity","1.0").css("filter", "alpha(opacity=100)");
				}
			}

		</script>

	
<?php
if (isset($_SESSION["alerta"])) {
	echo <<<heredoc
<script type="text/javascript" />
	// alert("{$_SESSION["alerta"]}");
	var alerta = '{$_SESSION["alerta"]}';
</script>
heredoc;
	unset($_SESSION["alerta"]);
}
elseif (isset($datos["alerta"])) {
	echo <<<heredoc
<script type="text/javascript" />
	// alert("{$datos["alerta"]}");
	var alerta = '{$datos["alerta"]}';
</script>
heredoc;
}
?>	
	
		<div id="globals">
		<?php
					var_dump($GLOBALS);
		?>
		</div>
		
		
		
	</body>

</html>