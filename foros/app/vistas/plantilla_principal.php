<!DOCTYPE HTML>
<html lang='es'>
	<head>
		<title><?=TITULO?></title>
		<meta name="Description" content="Explicación de la página" /> 
		<meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
		<meta name="Generator" content="esmvcphp framewrok" /> 
	 	<meta name="Origen" content="esmvcphp framework" /> 
		<meta name="Author" content="Jesús María de Quevedo Tomé" /> 
		<meta name="Locality" content="Madrid, España" /> 
		<meta name="Lang" content="es" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" /> 
		<meta http-equiv="Content-Language" content="es"/>
		
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/main.css" />
		
		<script type='text/javascript' src="<?php echo URL_ROOT."recursos".DS."js".DS."jquery-1.10.2.min.js"; ?>" ></script>
		<script type='text/javascript' src="" ></script>
	</head>
	<body>
		<h1>Portal de FOROS de DAW2</h1>
		<div>
		<?php echo $datos["view_content"]; ?>
		</div>
		<footer>
			<p>Portal de foros para DAW2</p>
			<p>IES Palomeras Vallecas (Madrid) Marzo-Junio 2014</p>
		</footer>
		
		<div id='globals' class='container-fluid'>
			<?php
				var_dump($GLOBALS);
			?>
		</div>
		
	</body>
</html>