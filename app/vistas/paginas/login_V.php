<?php require(RUTA_APP . "/vistas/inc/header_V.php"); ?>

	<div class="container contenedor_1">
		<div class="contenedor_15">
			<h1 class="h1_2">Para realizar una denuncia es necesario iniciar sesión</h1>
			<div class="row">
				<div class="col-sm-4 contenedor_9">
					<form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">	
						<div class="form-group">
							<input class="form-control" type="email" name="correo_Arr" id="Correo" placeholder="e-mail" autocomplete="off">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="clave_Arr" id="Clave" placeholder="Contraseña" autocomplete="off">
						</div>
						<div class="">
							<input type="checkbox" id="Recordar" name="recordar" value="1">
							<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
						</div>
						<input type="text" name="datosVarios" value="<?php echo $Datos;?>" hidden>
						<input class="btn btn-primary boton_1" type="submit" value="Entrar"><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
						<hr>
						<p class="p_4">¿Olvidaste tu contraseña?
						<label class="label_1 label_4" onclick="NotificarContrasena()">Recuperala</label></p>
					</form>
					<div class="">	
						<p class="p_4">¿No tienes cuenta?
						<a href="<?php echo RUTA_URL . '/Registro_C';?>"><label class="label_1 label_4">Registrate</label></a><p>
					</div>
				</div>
			</div>
		</div>
		<div class="contenedor_3" id="Contenedor_16" onclick="OcultarDiv()">
			<form action="<?php echo RUTA_URL . '/Login_C/RecuperarClave';?>" method="POST" autocomplete="off">
				<fieldset class="Afiliacion_5" style="background-color: #F4FCFB; border-radius: 15px;">
					<p class="span_2">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
					<br>
					<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
					<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
				</fieldset>
			</form>
		</div>
	</div>
		
<?php include(RUTA_APP . "/vistas/inc/footer_V.php");?>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>