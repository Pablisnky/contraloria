<!DOCTYPE html>
<html lang="es">
	<head>
		<title><?php //echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset = utf-8">
		<meta name="description" content=".">
		<meta name="keywords" content="">
		<meta name="author" content="Pablo Cabeza">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="expires" content="27 de diciembre de 2019">

		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">
		
		<?php
			$this->load->helper('html'); //necesario por link_tag()
			echo link_tag('public/css/estilosContraloria.css');
		?>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<!-- <link rel="shortcut icon" type="image/png" href="../images/logo_aplicacion/logo_Mira_horebi.png"> -->
        
		<script type="text/javascript" src="public/javascript/Funciones_varias.js'"></script> 
        <script type="text/javascript" src="public/javascript/Funciones_Ajax.js"></script>
	</head>
    <body>		
		<header class="header_1">
			<nav class="navbar navbar-expand-lg navbar-light  nav_1">
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ">
						<!-- <a class="nav-item nav-link active" href="<?php // echo RUTA_URL . '/Inicio_C';?>">Inicio<span class="sr-only">(current)</span></a>-->
						<a class="nav-item nav-link" href="#">Nuestro ADN</a>
						<a class="nav-item nav-link" href="<?php echo site_url('/Estadisticas_C');?>">Estadisticas</a>
						<a class="nav-item nav-link" href="<?php // echo RUTA_URL . '/Registro_C';?>">Registrase</a>
						<a class="nav-item nav-link" href="<?php // echo RUTA_URL . '/Login_C';?>">Participación social</a>
						<a class="nav-item nav-link" href="<?php // echo RUTA_URL . '/Frases_C';?>">Frases</a> 
						<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Donaciones</a>
					</div>
				</div>
					<?php
					//sesion creada en Login_C.php
            		if($this->session->userdata('logueado')){	
						$Nombre = $this->session->userdata('nombre');
						//se busca solo el primer nombre
						$Nombre = explode(' ',trim($Nombre));
						// echo $Nombre[0];
						?>
					 	<div class="contenedor_4 contenedor_4a" id="Contenedor_4">
					 		<a class="a_1 boton_1" href="<?php echo site_url('/Login_C/cerrar_sesion');?>"><?php echo $Nombre[0];?></a>
					 		<a class="a_2 boton_1" href="<?php echo site_url('/Login_C/cerrar_sesion');?>">Cerrar sesión</a>
					 	</div>
					 	<?php
					}	?>
			</nav>
		</header>

   <!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->