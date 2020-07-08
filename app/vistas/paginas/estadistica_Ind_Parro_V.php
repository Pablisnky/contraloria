
<!-- Pagina cargada por el controlador Estadisticas_C/cargar dentro de estadisticas_V via Ajax-->
<div class="container contenedor_16">
    <?php
    if(empty($Datos)){
        echo "Ho hay registro de denuncias en la parroquia indicada";
    }
    else{  ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SECTOR</th>
                    <th scope="col">SERVICIO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">DETALLES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Se reciben los datos desde Estadisticas_C/Cargar
                $arr = $Datos->fetchAll(PDO::FETCH_ASSOC);
                foreach($arr as $row){
                    $Sector = $row['sector'];
                    $Servicio = $row['servicio'];
                    $Estado = $row['estado'];
                    $Municipio = $row['municipio'];
                    $Parroquia = $row['parroquia'];
                    $FechaConsulta = $_SESSION['Fecha'];
                    ?>
                    <tr>
                        <td><?php echo $Sector?></td>
                        <td><?php echo $Servicio?></td>
                        <td>  
                            <?php
                            //Se CONSULTA la cantidad (solo numero) de denuncias realizadas por servicio en una parroquia (esta solicitud de consulta debería estar en el controlador, pero no encontre manera de hacerlo)
                            $this->ConsultaEstadistica_M = $this->modelo("Estadistica_M");
                            $Denuncias = $this->ConsultaEstadistica_M->consultarCantidadDenuncias($Estado, $Municipio, $Parroquia, $Servicio, $FechaConsulta);

                            $arr_2 = $Denuncias->fetchAll(PDO::FETCH_ASSOC);
                            foreach($arr_2 as $Denuncias){  
                                $TotalDenuncias = $Denuncias['Total']; 
                                echo $TotalDenuncias;
                            }                          
                            ?>  
                            
                        </td>  
                        <td><label class="label_4" onclick="AbrirPresentacion('<?php echo $Estado?>', '<?php echo $Municipio?>','<?php echo $Parroquia?>','<?php echo $FechaConsulta?>','<?php echo $Servicio?>')">Ver</label></td>
                    </tr>    
                    <?php 
                }   
                ?> 
            </tbody>
        </table>
        <label class="boton_1">Descargar</label>
        <?php
    }   ?>
</div>  