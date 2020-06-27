<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container contenedor_1">
		<h2 class="h2_2">Para realizar una denuncia es necesario iniciar sesión</h2>
		<div class="row">
			<div class="col-sm-4 contenedor_9">
				<form action="<?php echo site_url('Login_C/ValidarSesion');?>" method='POST'>	
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
					<input type="text" name="sector" value="<?php echo $sector;?>" hidden>
					<input type="text" name="servicio" value="<?php echo $servicio;?>" hidden>
					<input class="btn btn-primary boton_1" type="submit" value="Entrar"><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
					<hr>
					<p class="p_1">¿Olvidaste tu contraseña?
					<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
				</form>
			</div>
		</div>
		<div class="">	
			<h2 class="h1_1">¿No tienes cuenta?
			<a class="" href="<?php echo site_url('/Registro_C');?>">Registrate</a><h2>
		</div>
		<div class="contenedor_3" id="Contenedor_16" onclick="OcultarDiv()">
			<form action="Login_C/RecuperarClave" method="POST" autocomplete="off">
				<fieldset class="Afiliacion_5" style="background-color: #F4FCFB; border-radius: 15px;">
					<p class="span_2">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
					<br>
					<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
					<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
				</fieldset>
			</form>
		</div>
	</div>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>