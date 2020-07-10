<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

		<div class="container contenedor_1">
			<h1 class="h1_2">¿Quienes Somos?</h1>
            <div class="contenedor_19">
                <img class="imagen_14 " alt="Fotografia Pablo Cabeza" src="<?php echo RUTA_URL;?>/public/images/Fot_PabloCabeza.jpg">
                <label class="label_2">Pablo Cabeza</label>
                <label class="label_3">Programador BackEnd de aplicaciones web</label>
                <label class="label_3">Desarrollador de software</label>
                <label class="label_3">T.S.U. Mecánica térmica</label>
                <label class="label_2"><a class="boton_1" href="<?php echo RUTA_URL . '/NuestroADN_C/pablins_Ky';?>">Más sobre mí</a></label>
            </div>
            
            <p class="p_1">Ciudad Transparente, es un proyecto social de iniciativa particular, en donde los usuarios pueden registran los fallos de los servicios publicos de una manera practica y a su vez pueden observar estadisticas de reportes de los mismos; como ciudadano corriente, aplicar la solución a estos fallos no esta en mis manos, pero puedo ayudar con la ubicación y el seguimiento de un problema especifico de una comunidad, para generar reportes que reflejen historiales de fallas y dejarlos a disponibilidad en esta plataforma, asi como tambien desarrollar predicciones con herramientas tecnologicas (Machine learning) para alertar cuando ciertos asuntos publicos no estan siendo bien administrados o se esta actuando de manera ineficiente.</p>

            <p class="p_1">Si deseas involucrarte en el proyecto y hacerlo crecer puedes contactarme por los siguientes medios:</p>
		</div>
           
<?php   
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>