<!-- Vista cargada desde Detalle_C -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

    <div class="container contenedor_1">
        <div class="contenedor_15">
            <p>A la fecha, no se ha emitido un comunicado oficial aclarando razónes o estableciendo plazos para hacer correcciones de fallos en su comunidad.</p>
                
            <h2 class="h1_3">Indique el fallo en el servicio</h2>
            <form action="<?php echo RUTA_URL?>/AcuseDenuncia_C" method="post" name="itemsFallos">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="100" value="100" onclick="DesactivarTextarea()">
                    <label class="label_1" for="100" onclick="DesactivarTextarea()">El agua no le llega</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="200" value="200" onclick="DesactivarTextarea()">
                    <label class="label_1" for="200" onclick="DesactivarTextarea()">Existe un bote de agua en la calle</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="falloAgua" id="300" value="300" onclick="DesactivarTextarea()">
                    <label class="label_1" for="300" onclick="DesactivarTextarea()" >Incumplimiento con avastecimiento por tanques cisternas</300>
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
        </div>
    </div>

<?php
    // Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>      