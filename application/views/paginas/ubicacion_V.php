<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/Municipios.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/parroquias.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/Funciones_varias.js"></script>
<script>
	animacion();
</script>

<div class="container contenedor_1"> 
    <h1 class="h1_2">Ubicación geografica de la comunidad donde existe el falllo con el agua potable</h1>               
    <form action="<?php echo site_url('Ubicacion_C/recibeUbicacion');?>" method="post">
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
        <div>
            <input type="text" name="sector" value="<?php echo $sector;?>" hidden>
            <input type="text" name="servicio" value="<?php echo $servicio;?>" hidden>
            <a class="btn btn-primary boton_1" href="javascript: history.go(-2)">Regresar</a>
            <input type="submit" class="btn btn-primary boton_1" value="Continuar">
        </div>
    </form>
</div>  