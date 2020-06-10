<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Funciones_varias.js'?>"></script> 

		<div class="container contenedor_1">
            <p>El ente responsable del servcio de agua potable en su comunidad es:</p>
            <p>Aguas del Yaracuy</p>
            <p>Director</p>
            <br><br>
            <p>A la fecha, Aguas del Yaracuy no a emitido un comunicado oficial aclarando razónes o estableciendo plazos para hacer correcciones de fallos en su comunidad.</p>
                
            <h2>Indique el fallo en el servicio</h2>
            <form action="<?php echo RUTA_URL?>/AcuseDenuncia_C" method="post">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="100" value="100">
                    <label class="label_1" for="100">El agua no le llega</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="200" value="200">
                    <label class="label_1" for="200">Existe un bote de agua en la calle</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="300" value="300">
                    <label class="label_1" for="300">Acuerdo de avastecimiento por tanques cisternas</300>
                </div>
                <input type="text" value="<?php echo $Datos;?>" name="varios_datos" hidden>
                <a class="btn btn-primary" href="javascript: history.go(-1)">Regresar</a>
                <input type="submit" class="btn btn-primary" value="Continuar">
            </form>           
        </div> 
         
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>