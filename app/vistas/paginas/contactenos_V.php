<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php");  ?>

		<div class="container contenedor_1">
            <div class="contenedor_15">
                <h1 class="h1_2">Contactenos.</h1>
                <div class="contenedor_22">
                    <form>                    
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Correo</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mensaje</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <input class="contador" type="text" name="contador" id="Contador" value="500">
                        </div>
                    </form>
                </div>
            </div> 
        </div>

<!-- Se carga el footer -->
<?php require(RUTA_APP . "/vistas/inc/footer_V.php"); ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/scrollUp.js';?>"></script>