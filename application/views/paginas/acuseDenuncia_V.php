<?php 
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    defined('BASEPATH') OR exit('No direct script access allowed');

    //Sesion creada en AcuseDenuncia_C.php
    if($this->session->userdata('ExisteDenuncia') == FALSE){  ?>
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
            <a class="btn btn-primary boton_1" href="<?php echo site_url('/CerrarS_C');?>">Cerrar sesión</a>
            <a class="btn btn-primary boton_1" href="<?php echo site_url('/Inicio_C');?>">Continuar denunciando</a>              
		</div>  
            <?php
    }
    else{   ?>  
        <div class="contenedor_5">
            <div class="contenedor_6">
                <p class="p_1">Esta denuncia la realizó el <?php echo $Fecha;?>, y tiene el código Nº <?php echo $Codigo;?>, debe esperar <?php echo $Dias;?> días para volver a realizarla.</p>
                <a class="btn btn-primary boton_1" href="javascript: history.go(-1)">Regresar</a>
                <a class="btn btn-primary boton_1" href="<?php echo site_url('/Estadisticas_C/indicadores/' . $Codigo);?>">Ver cifras de este fallo</a>
            </div>
        </div>  <?php
    }   
?>