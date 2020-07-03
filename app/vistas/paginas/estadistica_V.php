<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

    <div class="container contenedor_1">
        <div class="contenedor_15">
            <h1 class="h1_2">Conozca la cantidad de fallos en servicios publicos de su municipio</h1> 
             <form>
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
                        <select class="form-control" name="parroquia" id="Parroquia" onchange="llamar_EstadisticasParroquia(); mostrarFrecuencia()">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="contenedor_12" id='Loading'>
                    <p class="p_6">Espere un momento</p>
                </div>
                <div class="contenedor_7" id="Contenedor_7">
                    <div class="contenedor_14">
                        <h1 class="h1_3">Denuncias realizadas:</h1>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="frecuencia" value="Semanal" id="Semana" checked onclick="llamar_EstadisticasParroquia()">
                        <label class="form-check-label label_1" for="Semana" onclick="llamar_EstadisticasParroquia()">Ultimos 7 días</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="frecuencia" value="Quincenal" id="Quince" onclick="llamar_EstadisticasParroquia()">
                        <label class="form-check-label label_1" for="Quince" onclick="llamar_EstadisticasParroquia()">Ultimos 15 días</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="frecuencia" value="Mensual" id="Treinta"  onclick="llamar_EstadisticasParroquia()">
                        <label class="form-check-label label_1" for="Treinta" onclick="llamar_EstadisticasParroquia()">Ultimos 30 días</label>
                    </div>
                </div>
            </form>
            <div id="Mostrar_Estadisticas"></div> 
        </div>
    </div>  

<!-- Se carga el footer -->
<?php require(RUTA_APP . "/vistas/inc/footer_V.php"); ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Municipios.js'?>"></script> 
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/parroquias.js'?>"></script> 
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Funciones_Ajax.js'?>"></script> 


            <!-- <h1 class="h1_2">Conozca las ordenanzas municipales de su estado</h1>         
            <p>En esta sección se visualizan graficos</p>
            <p>Cantidad de denuncias hechas el día de hoy de manera general</p>
            <p>Cantidad de denuncias por semana de manera general</p>
            <p>Problemas solucionados</p>
            <p>Responsables de instituciones en numero</p>
            <p>Responsabilidad del concejal en numero</p>
            <p>Responsabilidad del alcalde en numero</p>
            <p>Responsabilidad de gobernador en numero</p>
            <p>Responsabilidad del ejecutivo nacional en numeros</p> -->