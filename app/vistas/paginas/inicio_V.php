<!-- Se carga el header -->
<?php
session_start(); 
include(RUTA_APP . "/vistas/inc/header.php");
?>
		<div class="container contenedor_1">
            <div class="contenedor_8">
                <div class="row contenedor_7">
                    <div class="col-sm-12 ">
                        <h1 class="h1_1">Indice de funcionabilidad de servicios públicos</h1>
                        <p class="p_1"></p>
                        <p class="p_1">La participación ciudadana en el control y evaluación sobre la gestión de los funcionarios del gobierno, es necesaria para prevenir la corrupcion, el fraude y la ineficiencia; mediante algoritmos de inteligencia artifical, analitica de datos y esta plataforma podemos detectar oportunamente e incluso predecir estas dolencias con el fin de proteger a nuestros ciudadanos, nuestras comunidades, nuestras ciudades y nuestro país, de quienes pretendan manejar el poder politico irresponsablemente.</p>
                    </div>
                </div>
                <div class="row">
                    <p class="p_1">Aspectos a considerar antes de hacer su evalución</p>
                </div>
                <div class="row contenedor_7">
                    <ul>
                        <li class="li_1">Separe el  aspecto ideológico-partidista  de la  práctica  de  la  contraloría  social  y  de  la  evaluación  de  la  gestión  pública</li>
                        <li class="li_1">La contraloría social no debe constituir un “mecanismo para el pase de factura personal"</li>
                        <li class="li_1"> El control social es un mecanismo de acción en la vigilancia, supervisión, seguimiento y control de los asuntos públicos.</li>
                    </ul>     
                </div>    
                <div>
                    <a class="a_3" href="#up">Selecione un servicio público para realizar su denuncia</a>
                </div> 
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
                        <li>Aseo urbano</li>
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
                        <li>Plaza</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Instituciones publicas</h2>
                    <ul class="ul_1">
                        <li>Estacion de policia</li>
                        <li>Estacion de bomberos</li>
                        <li>Mercado municipal</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="bg-primary text-white h2_2">Entes gubernamentales</h2>
                    <ul  class="ul_1">
                        <li> Gobernación</li>
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

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/scrollUp.js';?>"></script>