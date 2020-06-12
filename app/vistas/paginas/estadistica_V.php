<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); ?>


		<div class="container contenedor_1">
            <div class="row">
                <h1 class="h1_2">Ubique geograficamente el servicio publico a consultar</h1> 
            </div>
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
            
            <p>En esta sección se visualizan graficos</p>
            <p>Cantidad de denuncias por semana</p>
            <p>Problemas solucionados</p>
            <p>Responsables de instituciones en numero</p>
            <p>Responsabilidad del concejal en numero</p>
            <p>Responsabilidad del alcalde en numero</p>
            <p>Responsabilidad de gobernador en numero</p>
            <p>Responsabilidad del ejecutivo nacional en numeros</p>
                
		</div>  
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>