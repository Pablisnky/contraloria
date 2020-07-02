<?php
    
    // Se carga el header 
    require(RUTA_APP . "/vistas/inc/header_V.php");
?>
	<div class="container contenedor_1">
		<h2 class="h1_1">Registro de usuarios</h2> 
		<div class="row">
			<div class="col-sm-5 contenedor_9">
				<form action="Registro_C/recibeRegistro" method="POST" name="registroGratis" onsubmit="return validar_01()">
					<fieldset class="fieldset_1">
						<legend class="legend_1">Datos personales</legend> 
						<div class="form-group">
							<input class="form-control" type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off"><!-- return literal() se encuentra en validarFormulario.js -->
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="cedula" id="Cedula" placeholder="Cedula" onchange="" autocomplete="off"><!--  return literal() se encuentra en validarFormulario.js -->
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="telefono" id="Telefono" placeholder="Telefono" onchange="" autocomplete="off"><!--  return literal() se encuentra en validarFormulario.js -->
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="correo" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200);" onclick="ColorearCorreo()"; autocomplete="off">
						</div>
						<div class="contenedor_2" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
					</fieldset>         
					<fieldset class="fieldset_1">
						<legend class="legend_1">Datos de accceso a la plataforma</legend>  
						<div class="form-group">
							<input class="form-control" type="password" name="clave" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
						</div>
						<div class="contenedor_3" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
						<div class="form-group">
							<input class="form-control" type="password" name="confirmarClave" id="ConfirmarClave" placeholder="Repetir contraseña">
						</div>                               
					</fieldset> 
					<input class="btn btn-primary boton_1" type="submit" name="Registrarse" value="Registrarse" style="display: block; width: 120px;">
				</form>
			</div>
		</div>		
	</div>
	
<?php include(RUTA_APP . "/vistas/inc/footer_V.php");?>