<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/Municipios.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/parroquias.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>/public/javascript/Funciones_Ajax.js"></script> 

    <div class="container contenedor_1">
        <h1 class="h1_2">Conozca las metricas en servicios publicos de nuestras parroquias</h1> 
        <form >
            <div class="form-row">
                <div class="col"> 
                    <label for="inputState">Estado</label>
                    <select class="form-control" name="estado" id="Estado" onchange="SeleccionarMunicipio(this.form)">
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
                    <select class="form-control" name="municipio" id="Municipio" onchange="SeleccionarParroquia(this.form)">
                        <option></option>
                    </select>
                </div>
                <div class="col">
                    <label for="inputState">Parroquia</label>
                    <select class="form-control" name="parroquia" id="Parroquia" onchange="llamar_EstadisticasParroquia()">
                        <option></option>
                    </select>
                </div>
            </div>
        </form>
        <div class="contenedor_66" id='Loading'>
            <p class="p_3">Espere un momento</p>
        </div>
        <div id="Mostrar_Estadisticas">   
            <h4>Ordenanzas municipales</h4>             
            <p>En esta sección se visualizan graficos</p>
            <p>Cantidad de denuncias hechas el día de hoy de manera general</p>
            <p>Cantidad de denuncias por semana de manera general</p>
            <p>Problemas solucionados</p>
            <p>Responsables de instituciones en numero</p>
            <p>Responsabilidad del concejal en numero</p>
            <p>Responsabilidad del alcalde en numero</p>
            <p>Responsabilidad de gobernador en numero</p>
            <p>Responsabilidad del ejecutivo nacional en numeros</p>
        </div>   
    </div>  