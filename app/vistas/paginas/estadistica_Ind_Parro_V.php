<!-- Se carga el header -->
<?php // include(RUTA_APP . "/vistas/inc/header.php"); ?>

    <div class="container contenedor_1">
        <?php
            if(empty($Datos)){
                echo "Ho hay registro de denuncias en la parroquia indicada";
            }
            else{
                print_r($Datos);
            } ?>
    </div>  
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>