<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Municipios.js'?>"></script> 
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/parroquias.js'?>"></script> 
<script>
	animacion();
</script>

<div class="container contenedor_1"> 
    <div class="contenedor_17">
        <h1 class="h1_2">Ubicación geografica de la comunidad donde existe el falllo con el agua potable</h1>               
        <form action="<?php echo RUTA_URL?>/Ubicacion_C/recibeUbicacion" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="inputState">Estado</label>
                    <select class="form-control" name="estado" onchange="SeleccionarMunicipio(this.form)">
                        <option></option>
                        <option>Amazonas</option>
                        <option>Anzoátegui</option>
                        <option>Apure</option>
                        <option>Aragua</option>
                        <option>Barinas</option>
                        <option>Bolivar</option>
                        <option>Carabobo</option>
                        <option>Cojedes</option>
                        <option>Delta Amacuro</option>
                        <option>Distrito Capital</option>
                        <option>Falcon</option>
                        <option>Guárico</option>
                        <option>Lara</option>
                        <option>Mérida</option>
                        <option>Miranda</option>
                        <option>Monagas</option> 
                        <option>Nueva Esparta</option>
                        <option>Portuguesa</option>
                        <option>Sucre</option>
                        <option>Táchira</option>
                        <option>Trujillo</option>                           
                        <option>Vargas</option>
                        <option>Yaracuy</option>
                        <option>Zulia</option>
                    </select>
                </div>
                <div class="col">
                    <label for="inputState">Municipio</label>
                    <select class="form-control" name="municipio" onchange="SeleccionarParroquia(this.form)">
                        <option></option>
                    </select>
                </div>
                <div class="col">
                    <label for="inputState">Parroquia</label>
                    <select class="form-control" name="parroquia" onchange="SeleccionarSector(this.form)">
                        <option></option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label>Dirección del sector</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="direccion" rows="3"></textarea>
            </div>
            <div class="">
                <!-- $Datos es recibido desde Ubicacion_C/index -->
                <input type="text" name="sector_servicio" value="<?php echo $Datos;?>" hidden >
                <a class="btn btn-primary boton_1" href="javascript: history.go(-2)">Regresar</a>
                <input type="submit" class="btn btn-primary boton_1" value="Continuar">
            </div>
        </form>
    </div>
</div>  

<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>