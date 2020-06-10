<!-- Se carga el header -->
<?php
session_start(); 
include(RUTA_APP . "/vistas/inc/header.php"); ?>

		<div class="container contenedor_1">
            <h1>Indice de funcionabilidad de servicios publicos</h1>
            <p>Plataforma de contraloría social que permite en tiempo real manifestar tu inconfomidad como usuario de algún servicio publico en tu comunida o ciudad</p>
            <p>La contraloría social es la herramienta fundamental para el  ejercicio de la participación, control y evaluación popular sobre la gestión del gobierno.</p>
            <p>Aspectos a considerar antes de hacer su evalución</p>
            <nav>
                <ul>
                    <li>Separe el  aspecto ideológico-partidista  de la  práctica  de  la  contraloría  social  y  de  la  evaluación  de  la  gestión  pública</li>
                    <li>La contraloría social no debe constituir un “mecanismo para el pase de factura personal”</li>
                    <li></li>
                    <li></li>
                </ul>
            </nav>           
            <div class="">
                <h2 class="h2_1">Selecione un servicio del sector afectado para realizar su denuncia</h2>
            </div> 
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Educación</h2>
                    <ul class="ul_1">
                        <li>Educación inicial</li>
                        <li>Educación primaria</li>
                        <li>Educación secundaria</li>
                        <li>Educación universitaria</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Transporte</h2>
                    <ul class="ul_1">
                        <li>Rutas urbanas</li>
                        <li>Rutas extraurbanas</li>
                        <li>Terminal de pasajeros</li>
                        <li>carretera</li>
                        <li>Autopista</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Salud</h2>
                    <ul class="ul_1">
                        <li>CDI</li>
                        <li>Ambulatorio</li>
                        <li>Hospital</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Comunidad</h2>
                    <ul class="ul_1">
                        <li><a href="<?php echo RUTA_URL . '/Ubicacion_C/index/Comunidad,AguaPotable';?>">Agua potable</a></li>
                        <li><a href="#">Aguas servidas</a></li>
                        <li>Electricidad</li>
                        <li>Gas</li>
                        <li>Internet</li>
                        <li>Telefono</li>
                        <li>Calles</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Deporte</h2>
                    <ul class="ul_1">
                        <li>Cancha</li>
                        <li>Gimnasio</li>
                        <li>Estadium</li>
                        <li>Piscina</li>
                        <li>Patinodromo</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Cultura</h2>
                    <ul class="ul_1">
                        <li>Teatro</li>
                        <li>Cinemateca</li>
                        <li>Librería</li>
                        <li>Tienda de arte</li>
                        <li>Museo</li>
                        <li>Galería</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Parque</h2>
                    <ul class="ul_1">
                        <li>Parque natural</li>
                        <li>Monumento natural</li>
                        <li>Parque ejercicio</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Instituciones publicas</h2>
                    <ul class="ul_1">
                        <li>Estacion de policia</li>
                        <li>Estacion de bomberos</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Entes gubernamentales</h2>
                    <ul  class="ul_1">
                        <li>Gobernación</li>
                        <li>Alcaldía</li>  
                        <li>Notaría</li>                  
                        <li>Registro mercantil</li>
                        <li>Registro civil</li>
                        <li>Notaria</li>
                    </ul>
                </div>
            </div> 
        </div>
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>