<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); ?>


		<div class="container contenedor_1">
            <div class="row contenedor_10">
                <h3 class="h3_1">Los organismos responsables por el servcio de agua potable en su comunidad son:</h3>
            </div>
            <div class="row">
                <div class="col">
                    <h4 class="h4_1">Aguas del Yaracuy</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
                <div class="col">
                    <h4 class="h4_1">Concejo municipal</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
                <div class="col">
                    <h4 class="h4_1">Alcaldía</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
                <div class="col">
                    <h4 class="h4_1">Contraloría municipal</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
                <div class="col">
                    <h4 class="h4_1">Gobernación</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
                <div class="col">
                    <h4 class="h4_1">Ejecutivo Nacional</h3>
                    <hr class="hr_1">
                    <h5 class="h5_1">Juan Garcia</h5>
                </div>
            </div>
            <br><br>
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
                    <input class="form-check-input" type="radio" name="falloAgua" id="DescribeFallo"  value="DescribeFallo" onclick="DesactivarTextarea()">
                    <label class="label_1" for="DescribeFallo" onclick="DesactivarTextarea()">Describa el problema sino esta contemplado en esta lista.</300>
                </div>                
                <div class="textarea_1" id="Textarea_1">
                    <textarea></textarea>
                </div>
                <input type="text" value="<?php echo $Datos;?>" name="varios_datos" hidden>
                <a class="btn btn-primary" href="javascript: history.go(-1)">Regresar</a>
                <input type="submit" class="btn btn-primary" value="Continuar">
            </form>           
        <div id="Resultado"></div>
        </div> 
         
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Funciones_varias.js'?>"></script> 