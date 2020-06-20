<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header.php");?>

		<div class="container contenedor_1">           
            <?php 
            include(RUTA_APP . "/vistas/paginas/fallosPorServicios/fallos_aguaPotable.php");
            ?>
            <div id="Resultado"></div>
        </div> 
         
<!-- Se carga el footer -->
<?php 
    require(RUTA_APP . "/vistas/inc/footer.php");
?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/Funciones_varias.js'?>"></script> 