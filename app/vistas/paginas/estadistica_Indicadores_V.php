<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php"); 
    print_r($Datos);
?>


		<div class="container contenedor_1">
            <h1 class="h1_1">Indicadores del servicio de agua potable en su comunidad</h1>
            <table class="table">
                <thead>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Parroquia</th>
                    <th>Sector</th>
                    <th>Habitantes</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Yaracuy</td>
                        <td>Peña</td>
                        <td>Ori</td>
                        <td>Caja de agua 1</td>
                        <td>500</td>
                    </tr>
                </tbody>
            </table>
            <div class="row contenedor_11">
                <div class="col">
                    <h3>Denuncias</h3>
                    <h4>Este mes</h4>
                    <h5>4</h5>
                </div>
                <div class="col">
                    <h3>Denuncias</h3>
                    <h4>Esta semana</h4>
                    <h5>4</h5>
                </div>                
                <div class="col">
                    <h3>Denuncias</h3>
                    <h4>hoy</h4>
                    <h5>4</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>% población afectado</h3>
                    <h4>20%</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Comunicados oficiales emitidos por entes responsables</h3>
                    <h4></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Historico de la problematica</h3>
                    <h4></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Noticias en prensa</h3>
                    <h4></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Ordenanzas municipales</h3>
                    <h4></h4>
                </div>
            </div>
            <p>En esta sección se visualizan graficos</p>
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