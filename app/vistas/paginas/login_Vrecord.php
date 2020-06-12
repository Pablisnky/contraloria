<?php
	// session_start();
	//Se traen los datos obtenidos en la consulta Entrada_C
	foreach($Datos["usuarioRecord"] as $usuarioRec){
        $Correo= $usuarioRec->correo;
        // echo "Correo: " . $Correo  . "<br>"; 
    } 
	$Cookie_clave = $_COOKIE["clave"];

    // Se carga el header 
    require(RUTA_APP . "/vistas/inc/header.php");
?>
    	<div class="container contenedor_1">
            <div class="row">
                <div class="col-sm-4">
					<h2>Inicia sesión</h2>			
					<form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">
					    <div class="form-group">
                            <input style="margin-bottom: 2%" type="email" name="correo_Arr" id="Correo" value="<?php if(isset($Correo)) echo $Correo;?>">
                        </div>
					    <div class="form-group">
                            <input style="margin-bottom: 2%" type="password" name="clave_Arr" id="Clave" value="<?php if(isset($Cookie_clave)) echo $Cookie_clave ;?>">
                        </div>
                        <div class="contenedor_13 contenedor_14">
                            <label class="recordar" for="Recordar">Para dejar de recordar sus datos de acceso, elimine datos guardados en el navegador.</label>
                        </div>
					    <input type="text" name="datosVarios" value="<?php echo $Datos;?>" hidden>
                        <input class="label_1 label_4" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
					</form>
				</div>
			</div>
		</div>
		<footer>
			<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
		</footer>
	</body>
</html>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>