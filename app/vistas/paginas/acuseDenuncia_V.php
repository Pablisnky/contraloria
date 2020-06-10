<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); ?>


		<div class="container contenedor_1">
                <h2>Su denuncia a sido procesada efectivamente. </h2>
                <p>En un plazo de 20 días sino han resuelto su problema podra volver a realizar la denuncia</p>
                <p>Se registro con el código 123231</p>
                <p>Este fallo ha sido reportado 30 veces esta semana</p>
                <p>Este fallo ha sido reportado 60 veces este mes</p>
                <p>Este fallo ha sido reportado 330 veces este año</p>
                <p>Si desea ver la recursividad de la falla vea nuestras estadisticas</p>

                <br><br>
                
                <!-- <p>Un servico de agua potable aceptable debe ser de efectivo en un 80%</p>
                <p>Actualmente la efectividad del director de Aguas del Yaracuy</p>
                <p>Actualmente la efectividad del alcalde de San Felipe en temas de gestión del agua potable</p>
                <p>Actualmente la efectividad del gobernador de Yaracuy en temas de gestión del agua potable</p>
                <p>Actualmente la efectividad del ejecutivo nacional en temas de gestión del agua potable en el estado Yaracuy</p> -->

                
                ******************************************************************************
                <p>Daremos 20 días para que los responsables tomen acciones, pasado ese tiempo usted podra volver a manifestar su inconfomidad con el servicio si continua el fallo</p>
                                
                <a class="btn btn-primary" href="<?php echo RUTA_URL . '/CerrarS_C'?>">Cerrar sesión</a><a class="btn btn-primary" href="<?php echo RUTA_URL . '/Inicio_C';?>">Continuar denunciando</a>

                
		</div>  
<?php 
    if(isset($Datos)){  ?>
        <div class="contenedor_5">
            <div class="contenedor_6">
                <p>Esta denuncia la realizaste el 23/23/2020, si para el 23/32/2020 el problema no fue resuelto podras volver a realizarla</p>
            </div>
        </div>  <?php
    }   
    
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>