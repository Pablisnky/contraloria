<!-- Se carga el header -->
<?php 
    include(RUTA_APP . "/vistas/inc/headerEstilos_V.php"); 

    // Se carga desde NuestroADN_C/encuestas
    if(empty($Datos)){  
        ?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <div class="contenedor_28">
                    <div class="contenedor_19">
                        <img class="imagen_14 " alt="Fotografia Pablo Cabeza" src="<?php echo RUTA_URL;?>/public/images/Fot_PabloCabeza.jpg">
                        <label class="label_2">Pablo Cabeza</a></label>
                        <label class="label_3">Programador BackEnd de aplicaciones web</label>
                        <label class="label_3">Desarrollador de software</label>
                        <label class="label_3">T.S.U. Mecánica térmica</label>
                    </div>
                    <p class="p_1">Solo pueden participar los inscritos en el CNE que sean electores en el Municipio San Felipe del estado Yaracuy.</p>
                    <br>
                    <form action="<?php echo RUTA_URL?>/NuestroADN_C/recibeEncuesta" method="POST">
                        <input class="input_2" type="text" name="cedula" placeholder="Introduzca Nº cedula"  autocomplete="off">   
                        <br><br> 
                        <input class="btn btn-primary boton_1" type="submit" name="enviar" value="Enviar">
                    </form>
                </div>
            </div>        
        </div>
        <?php
        $Datos = "";
    }
    else if($Datos[0] == 'agradecimiento'){   
        // if(){   ?>
            <!-- <p>Tenemos un incoveniente, esta verificación se realiza con el registros de electores que suministra el CNE los cuales no son actualizados desde abril de 2012, de manera automatica no hemos encontrado tu documento como elector del municipo san Felipe, por lo que nos toca hacer la verificación manualmente, te invitamos a que realices la encuesta dentro de unos 30 minutos mientras verificamos que eres elector del municipio San Felipe.</p>
            <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label> -->
            <?php
        // }
        // else{   ?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <?php echo $Datos[1];?>
                <h2>Gracias por tu apoyo</h2>
                <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label>
            </div>
		</div>
            <?php
    } 
    else if($Datos[0] == 'participo'){ ?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <?php echo $Datos[1];?>
                <h2>Usted ya participó</h2>
                <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label>
            </div>
		</div>
        <?php
    }
    else if($Datos[0] == 'cne'){ ?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <h2>Usted no aparece registrado como elector del municipio San Felipe del estado Yaracuy. </h2>
                <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label>
            </div>
		</div>
        <?php
    }
    else{?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <h2>Hubo un fallo</h2>
                <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label>
            </div>
		</div>
        <?php
    }

    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>