<!-- Se carga el header -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

		<div class="container contenedor_1">
			<h1 class="h1_2">Presentación</h1>
            <div class="contenedor_19">
                <img class="imagen_14 " alt="Fotografia Pablo Cabeza" src="<?php echo RUTA_URL;?>/public/images/Fot_PabloCabeza.jpg">
                <label class="label_2">Pablo Cabeza</label>
                <label class="label_3">Programador BackEnd de aplicaciones web</label>
                <label class="label_3">Desarrollador de software</label>
                <label class="label_3">T.S.U. Mecánica térmica</label>
            </div>
            
            <p class="p_3">Hola, quiero presentarme antes de proponerte que conteste una encuesta de una única pregunta para saber si vale la pena invertir tiempo en preparar una postulación como alcalde del Municipio San Felipe del estado Yarauy.</p>
            <ul>
                <li class="li_2">Actualmente trabajo como desarrollador de software y quiero aportar mis conocimiento en tecnología para impactar positivamente a nuestro municipio, al estado y al país. Un ejemplo de esto, es la plataforma de denuncias Ciudad Transparente, la cual desarrollé y formo parte activa del equipo de trabajo de este proyecto único en el país.</li>

                <li class="li_2">Otro proyecto social inedito en nuestro país que tengo listo y que mejorará significativamente el servicio de atención en salud publica y privada, es una plataforma digital que administra historias médicas, interconecta centros de salud y permite el agendamiento de citas por medio de la nube, esta plataforma para entrar en producción solo faltan los permisos necesarios para que los centros de salud que se encuentren dentro del municipio tanto publicos como privados puedan correrla, en el futuro pudiesemos extenderla al pais entero.</li>

                <li class="li_2">Y para gestionar nuestra alcaldía estoy diseñando la arquitectura de un sistema digital para administrar los impuestos, el catastro, las tierras, el parque automotar, la gestión de la basura, el presupuesto del municipio entre otras responsabilidades, la cual sera totalmente accesible a la ciudadania para trabaja con datos abiertos.</li>

                <li class="li_2">Por otro lado tengo estudios universitarios en Mecánica Térmica, por lo que domino muy bien temas de gestión y administración de recursos energeticos y mantenimiento general de infraestructura física, maquinaria y equipos.</li>
                
                <li class="li_2">Con respecto a la actual crisis, debemos sacar provecho que el planeta esta construido bajo software, de modo  que podemos obtener recursos adicionales exportando productos y servicios digitales creados en la alcaldía por medio de una división de diseño de software con talento sanfelipeño principalmente, ofrecerlos al gobierno central o realizando convenios con otros paises a cambio de recursos economicos o especies.</li>

                <li class="li_2">Nunca he pertenecido a un partido, porque los politicos por tener una perspectiva de conveniencia politica-idealista-oportunista viven confunfiendo el error con la verdad y multiplican exponencialmente los problemas sociales; en mi caso la solución de estos problemas siempre tendran una perspectiva tecnica-cientifica prevaleciendo el desarrollo sustentable y la equidad.</li>

                <li class="li_2">Y por ultimo soy atleta aficionado, asi que todos los días cuando comencemos a comer bien nuevamente, podremos salir juntos a corre 5K, 10K ó 30K por las calles de nuestro municipio.</li>
            </ul>
            <div class="contenedor_22">
            <p class="p_2">¿Tendrias intención de voto a mi favor si me postulo a alcalde del municipio San Felipe?</p>
            </div>
            <div class="contenedor_23">
                <div class="contenedor_24">
                    <label class="btn btn-primary boton_1 boton_2" onclick="encuesta()">Si</label>
                </div>
                <div class="contenedor_24">
                    <label class="btn btn-primary boton_1 boton_2" onclick="location.href='../Inicio_C'">No</label>
                </div>
                <div class="contenedor_25">
                    <label class="label_3">Electores que me apoyan</label>
                    <input class="input_1" type="text" value="36.453" readonly>
                </div>

            </div>
		</div>
           
<?php   
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>