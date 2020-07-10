<?php include(RUTA_APP . "/vistas/inc/header_V.php");  ?>

		<div class="container contenedor_1">
            <div class="contenedor_8">
                <div class="row contenedor_7">
                    <div class="col-sm-12">
                        <p class="p_1">La participación ciudadana en el control y evaluación sobre la gestión publica, es necesaria para prevenir la corrupcion, el fraude y la ineficiencia, a la vez que ayuda a los administradores y dirigentes gubernamentales a conocer lo que sucede en sus comunidades. Conectar Ambas premisas, realizar metricas con machine learning y sostener la trazabilidad de los problemas en tiempo real para predecir malas practicas en el manejo del asunto público, es el objetivo de este servicio comunitario.</p>
                    </div>
                </div>
                <div class="contenedor_26">
                    <div class="contenedor_24">
                        <div class="contenedor_27">
                            <label class="label_6">Denuncias de hoy</label>
                            <label class="label_5"><?php echo $Datos;?></label>
                            <label class="label_3">Municipio San Felipe - Yaracuy</label>
                        </div>
                    </div>
                    <div style="overflow: hidden;">
                        <iframe src="<?php echo RUTA_URL . '/public/grafico/Gra_MasComunes.php'?>" marginwidth="0" marginheight="0" name="ventana_iframe" frameborder="0" height=300 width=800>
                        </iframe> 
                    </div>
                </div>
                <div>
                    <a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C/denuncias';?>">Selecione un servicio público para realizar su denuncia</a>
                </div> 
            </div>
            <div>
                <!-- <p>Fallos estadisticamente no resueltos</p>
                <p>Fallos estadisticamente resueltos</p>
                
                <p>En esta sección se visualizan graficos</p>
                <p>Cantidad de denuncias hechas el día de hoy de manera general</p>
                <p>Cantidad de denuncias por semana de manera general</p>
                <p>Problemas solucionados</p>
                <p>Responsables de instituciones en numero</p>
                <p>Responsabilidad del concejal en numero</p>
                <p>Responsabilidad del alcalde en numero</p>
                <p>Responsabilidad de gobernador en numero</p>
                <p>Responsabilidad del ejecutivo nacional en numeros</p> -->
            </div>
        </div>
<!-- Se carga el footer -->
<?php require(RUTA_APP . "/vistas/inc/footer_V.php"); ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/scrollUp.js';?>"></script>