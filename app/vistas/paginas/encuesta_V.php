<!-- Se carga el header -->
<?php 
    include(RUTA_APP . "/vistas/inc/headerEstilos_V.php"); 

    if(!isset($_POST["enviar"])){   ?>
		<div class="container contenedor_1">
            <div class="contenedor_15">
			    <h1 class="h1_2">Evaluando postulación a la Alcaldía de San Felipe-Yaracuy</h1>
                <div class="contenedor_19">
                    <img class="imagen_14 " alt="Fotografia Pablo Cabeza" src="<?php echo RUTA_URL;?>/public/images/Fot_PabloCabeza.jpg">
                    <label class="label_2">Pablo Cabeza</a></label>
                    <label class="label_3">Programador BackEnd de aplicaciones web</label>
                    <label class="label_3">Desarrollador de software</label>
                    <label class="label_3">T.S.U. Mecánica térmica</label>
                </div>
                <p class="p_1">Solo pueden participar en la encuesta todos los inscritos en el registro electoral que sean electores en el Municipio San Felipe del estado Yaracuy.</p>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <input type="text" name="cedula" placeholder="Introduzca Nº cedula">   
                    <br> 
                    <input class="btn btn-primary boton_1" type="submit" name="enviar" value="Enviar">
                </form>
            </div>        
        </div>
        <?php
    }
    else{   ?>
        <p>Tenemos un incoveniente, esta verificación se realiza con datos de registros de electores que suministra el CNE, los cuales no son actualizados desde abril de 2012, por lo que nos toca hacer la verificación manualmente, te invitamos a que realices la encuesta dentro de unos 30 minutos mientras verificamos que eres elector del municipio San Felipe.</p>
        <label class="btn btn-primary boton_1" onclick="CerrarPresentacion()">Cerrar</label>
        

        <p>Gracias por participar, si los resultados de la encuesta son favorables, estaré en la carta de candidatos a la Alcaldía del Municipio San Felipe y en pocos meses tendremos un Alcalde de primer nivel para hacer de San Felipe y sus alrededores una Ciudad Transparente con un sistema de gestión publico unico en el país.</p> 
           
        <?php 
    }  
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>