<?php include(RUTA_APP . "/vistas/inc/headerEstilos_V.php");

// sesion creada en Estadisticas_C
$Frecuencia = $_SESSION['Frecuencia'];

foreach($Datos as $row) {
    $Servicio = $row['servicio'];
}
?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
                <h1 class="h1_2">Denuncias realizadas por problemas con <?php echo $Servicio;?> en los ultimos <?php echo $Frecuencia;?> días</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ESTADO</th>
                            <th scope="col">MUNICIPIO</th>
                            <th scope="col">PARROQUIA</th>
                            <th scope="col">ZONA</th>
                            <th scope="col">DIRECCION</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">HORA</th>
                            <th scope="col">SERVICIO</th>
                            <th scope="col">PROBLEMA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Se reciben los datos desde Graficos_C
                        //$arr = $Datos->fetchAll(PDO::FETCH_ASSOC);
                        foreach($Datos as $row) {
                            $Estado = $row['estado'];
                            $Municipio = $row['municipio'];
                            $Parroquia = $row['parroquia'];
                            $Zona = $row['zona'];
                            $Direccion = $row['direccion'];
                            $Fecha = $row['fechaDenuncia'];
                            $Hora = $row['horaDenuncia'];
                            $Servicio = $row['servicio'];
                            $Descripcion = $row['descripcionFallo'];
                            ?>
                            <tr>
                                <td><?php echo $Estado;?></td>
                                <td><?php echo $Municipio;?></td>
                                <td><?php echo $Parroquia;?></td>
                                <td><?php echo $Zona;?></td>
                                <td><?php echo $Direccion;?></td>
                                <td><?php echo $Fecha;?></td>
                                <td><?php echo $Hora;?></td>
                                <td><?php echo $Servicio;?></td>
                                <td><textarea class="textarea_2" readonly><?php echo $Descripcion;?></textarea></td>
                            </tr>
                            <?php 
                        } 
                        ?>
                    </tbody>
                </table>
                <div>
                    <label class="btn btn-primary boton_1" onclick="CerrarVentana()">Cerrar</label>
                    <label class="btn btn-primary boton_1 ">Descargar</label>
                    <label class="btn btn-primary boton_1"><a class="a_6" href="<?php echo RUTA_URL . '/Infografia_C/index/Comunidad,AguaServida';?>">Infografia</a></label>
                    <label class="btn btn-primary boton_1"><a class="a_6" href="<?php echo RUTA_URL . '/Infografia_C/index/Comunidad,AguaServida';?>">Historial</a></label>
                </div>
             </div>
		</div>  

<?php require(RUTA_APP . "/vistas/inc/footer_V.php"); ?>