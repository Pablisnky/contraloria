    <div class="container contenedor_1">
        <?php
        if(empty($Datos)){
            print_r($Datos);
            echo "Ho hay registro de denuncias en la parroquia indicada";
        }
        else{   ?>
            <div class="container contenedor_1">
                <div class="row contenedor_7">
                    <h3>Denuncias realizadas y sin respuesta oficial</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SECTOR</th>
                            <th scope="col">DETALLE</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">DETALLES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Se reciben los datos desde Estadisticas_C
                        foreach($Datos["informacionDenuncia"] as $Inform_Denun){
                            $Estado =  $Inform_Denun -> estado; 
                            $Municipio =  $Inform_Denun -> municipio; 
                            $Parroquia =  $Inform_Denun -> parroquia; 
                            $Sector = $Inform_Denun -> sector; 
                            $Servicio = $Inform_Denun -> servicio; 
                            $Fecha = $Inform_Denun -> fechaDenuncia;   ?>
                            <tr>
                                <td><?php echo $Sector?></td>
                                <td><?php echo $Servicio?></td>
                                <td>  
                                    <?php
                                    //Se CONSULTA la cantidad de denuncias realizadas por servicio en una parroquia
                                    $Denuncias = $this->ConsultaEstadistica_M->consultarCantidadDenuncias($Estado, $Municipio, $Parroquia, $Servicio);
                                    foreach($Denuncias as $Cant_Denun){  
                                        $TotalDenuncias = $Cant_Denun -> Total; 
                                        echo $TotalDenuncias;
                                    }  ?>  
                                </td>
                                <td><a class="" href="<?php echo RUTA_URL . '/TotalDenuncia_C/index/Comunidad,AguaServida';?>">Ver</a></td>
                            </tr>    
                            <?php 
                            }   
                        ?> 
                    </tbody>
                </table>
            </div>
            <?php
        }   ?>
    </div>  
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>