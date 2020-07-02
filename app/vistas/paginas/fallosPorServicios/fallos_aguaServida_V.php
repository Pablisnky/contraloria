<!-- Vista cargada desde Detalle_C -->
<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

    <div class="container contenedor_1">
        <p>A la fecha, no se ha emitido un comunicado oficial aclarando razónes o estableciendo plazos para hacer correcciones de fallos en su comunidad.</p>
            
        <h2 class="h1_3">Indique el fallo en el servicio</h2>
        <form action="<?php echo RUTA_URL?>/AcuseDenuncia_C" method="post" name="itemsFallos">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="falloAgua" id="400" value="400" onclick="DesactivarTextarea()">
                <label class="label_1" for="400" onclick="DesactivarTextarea()">Existe un bote de agua servida</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="falloAgua" id="500" value="500" onclick="DesactivarTextarea()">
                <label class="label_1" for="500" onclick="DesactivarTextarea()">Tapa de boca de visita dañada o inexistente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="falloAgua" id="600" value="600" onclick="DesactivarTextarea()">
                <label class="label_1" for="600" onclick="DesactivarTextarea()" >Rejilla de alcantarilla dañada o inexistente</300>
            </div>
            <hr>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="falloAgua" id="DescribeFallo"  value="2000" onclick="DesactivarTextarea()">
                <label class="label_1" for="DescribeFallo" onclick="DesactivarTextarea()">Describa el problema sino esta contemplado en esta lista.</300>
            </div>                
            <div class="textarea_1" id="Textarea_1">
                <textarea name="descripcionFallo" ></textarea>
            </div>
            <input type="text" value="<?php echo $Datos;?>" name="varios_datos" hidden>
            <a class="btn btn-primary boton_1" href="javascript: history.go(-1)">Regresar</a>
            <input type="submit" class="btn btn-primary boton_1" value="Continuar">
        </form>           
        <div id="Resultado"></div>
    </div> 
         
<?php 
    // Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>

<!-- <script type="text/javascript" src="<?php //echo RUTA_URL . '/public/javascript/Funciones_varias.js'?>"></script>  -->