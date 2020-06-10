<?php
	// Se carga el header 
	require(RUTA_APP . "/vistas/inc/header.php");
?>

	<div class="container">
		<h2>Para realizar una denuncia es necesario iniciar sesión</h2>
		<div class="row">
			<div class="col-sm-4">
				<form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">	
					<div class="form-group">
						<input class="form-control" type="email" name="correo_Arr" id="Correo" placeholder="e-mail" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="clave_Arr" id="Clave" placeholder="Contraseña" autocomplete="off">
					</div>
					<div class="contenedor_13">
						<input type="checkbox" id="Recordar" name="recordar" value="1">
						<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
					</div>
					<input type="text" name="datosVarios" value="<?php echo $Datos;?>" hidden>
					<input class="btn btn-primary" type="submit" value="Entrar"><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
					<hr>
					<p class="parrafo_1">¿Olvidaste tu contraseña?
					<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
				</form>
			</div>
		</div>
		<div class="row">	
			<h2>¿No tienes cuenta?<h2>
			<a class="label_2" href="<?php echo RUTA_URL . '/Registro_C';?>">Registrate</a></p>
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
	<footer>
		<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
	</footer>
	</body>
</html>	

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>