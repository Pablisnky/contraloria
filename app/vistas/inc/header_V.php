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
 
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosContraloria.css"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<!-- <link rel="shortcut icon" type="image/png" href="../images/logo_aplicacion/logo_Mira_horebi.png"> -->
	</head>
    <body>		
		<header class="header_1">
			<nav class="navbar navbar-expand-lg navbar-light menuResponsive  nav_1">
				<a class="navbar-brand" href="<?php echo RUTA_URL . '/Inicio_C';?>">
					<img src="<?php echo RUTA_URL;?>/public/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> Ciudad Transparente
				</a>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav contenedor_20">
						<div>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-item nav-link " href="<?php echo RUTA_URL . '/Inicio_C/denuncias';?>">Denunciar</a>
								</li> 
								<li class="nav-item">
									<a class="nav-item nav-link" href="<?php echo RUTA_URL . '/Estadisticas_C';?>">Estadisticas</a>
								</li>
								<li class="nav-item menuLi_1">
									<a class="nav-item nav-link" href="#">Nuestro ADN</a>  
									<ul class="navbar-nav menuContenedor_2">
										<li class="nav-item"><a class="nav-item nav-link " href="<?php echo RUTA_URL . '/NuestroADN_C';?>">Quíenes somos</a></li> 
										<li class="nav-item"><a class="nav-item nav-link "  href="<?php echo RUTA_URL . '/NuestroADN_C/queHacemos';?>">Qué hacemos</a></li>
										<li class="nav-item"><a class="nav-item nav-link "  href="<?php echo RUTA_URL . '/Participacion_C';?>">FAQ</a></li>
										<li class="nav-item"><a class="nav-item nav-link " href="<?php echo RUTA_URL . '/NuestroADN_C/contactenos';?>">Contactenos</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link" href="<?php echo RUTA_URL . '/Donar_C';?>">Donar</a>
								</li>	
							</ul>
						</div>
						<div>
							<?php
							if(!isset($_SESSION["ID_Afiliado"])){	?>
								<div class="navbar-nav contenedor_21">
									<a class="nav-item nav-link" href="<?php echo RUTA_URL . '/Login_C';?>">Inicie sesión</a>
									<a class="nav-item nav-link" href="<?php echo RUTA_URL . '/Registro_C';?>">Registrase</a>
								</div>
								<?php
							}	
							else{	?>							
								<div class="contenedor_4 contenedor_4a" id="Contenedor_4">
									<a class="boton_1 a_1" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Pablo</a>
									<a class="boton_1 a_2" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Cerrar sesión</a>
								</div>		<?php
							}	?>
						</div>
					</div>
				</div>
			</nav>
		</header>

   <!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->