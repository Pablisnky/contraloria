<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

		<div class="container contenedor_1">
            <div class="contenedor_15">
                <h1 class="h1_2">Denuncias realizadas por problemas con <?php echo "Agua potable en los ultimos siete día"?></h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ESTADO</th>
                            <th scope="col">MUNICIPIO</th>
                            <th scope="col">DIRECCION</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">HORA</th>
                            <th scope="col">SERVICIO</th>
                            <th scope="col">PROBLEMA</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            //Se reciben los datos desde Estadisticas_C
                            $arr = $Datos->fetchAll(PDO::FETCH_ASSOC);
                            foreach($arr as $row) {
                                $Estado = $row['estado'];
                                $Municipio = $row['municipio'];
                                $Direccion = $row['direccion'];
                                $Fecha = $row['fechaDenuncia'];
                                $Hora = $row['horaDenuncia'];
                                $Servicio = $row['servicio'];
                                $Descripcion = $row['descripcionFallo'];
                                ?>
                        <tr>
                            <td><?php echo $Estado;?></td>
                            <td><?php echo $Municipio;?></td>
                            <td><?php echo $Direccion;?></td>
                            <td><?php echo $Fecha;?></td>
                            <td><?php echo $Hora;?></td>
                            <td><?php echo $Servicio;?></td>
                            <td><textarea class="textarea_2" readonly><?php echo $Descripcion;?></textarea></td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <label class="boton_1">Imprimir reporte</label>
                <a class="boton_1 a_2" href="javascript: history.go(-2)">Regresar</a>
             </div>
		</div>  

            <!-- <div id="Mostrar_Estadisticas"> 
                <h1 class="h1_2">Conozca las ordenanzas municipales de su estado</h1>         
                <p>En esta sección se visualizan graficos</p>
                <p>Cantidad de denuncias hechas el día de hoy de manera general</p>
                <p>Cantidad de denuncias por semana de manera general</p>
                <p>Problemas solucionados</p>
                <p>Responsables de instituciones en numero</p>
                <p>Responsabilidad del concejal en numero</p>
                <p>Responsabilidad del alcalde en numero</p>
                <p>Responsabilidad de gobernador en numero</p>
                <p>Responsabilidad del ejecutivo nacional en numeros</p>
            </div> -->
<!-- Se carga el footer -->
<?php require(RUTA_APP . "/vistas/inc/footer_V.php"); ?>