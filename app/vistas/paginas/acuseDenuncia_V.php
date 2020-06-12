<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); 

    if($Datos == ""){  ?>
		<div class="container contenedor_1">
            <h2>Su denuncia a sido procesada satisfactoriamente. </h2>
            <p>En un plazo de 20 días podra volver a realizar la denuncia sino han resuelto su problema</p>
            <p>Se registro con el código 123231</p>
            <p>Este fallo ha sido reportado 30 veces esta semana</p>
            <p>Este fallo ha sido reportado 60 veces este mes</p>
            <p>Este fallo ha sido reportado 330 veces este año</p>
            <p>Si desea ver la recursividad de la falla vea nuestras estadisticas</p>

            <br><br>
                            
            ******************************************************************************
            <p>20 días es tiempo suficiente para que los responsables tomen acciones, pasado ese tiempo usted podra volver a manifestar su inconfomidad con el servicio si continua el fallo</p>
                            
            <a class="btn btn-primary" href="<?php echo RUTA_URL . '/CerrarS_C'?>">Cerrar sesión</a><a class="btn btn-primary" href="<?php echo RUTA_URL . '/Inicio_C';?>">Continuar denunciando</a>              
		</div>  
            <?php
    }
    else{   ?>  
        <div class="contenedor_5">
            <div class="contenedor_6">
                <p class="p_1">Esta denuncia la realizó el <?php echo $Datos[0];?>, y tiene el código Nº <?php echo $Datos[2];?>, debe esperar <?php echo $Datos[1];?> días para volver a realizarla.</p>
                <a class="btn btn-primary " href="javascript: history.go(-1)">Regresar</a>
                <a class="btn btn-primary " href="<?php echo RUTA_URL . '/Estadisticas_C/indicadores/3,4,5,6'?>">Ver cifras de este fallo</a>
            </div>
        </div>  <?php
    }   
    
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>