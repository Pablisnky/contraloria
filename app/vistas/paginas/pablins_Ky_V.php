<!-- Pagina cargada desde NuestroADN_C/pablins_ky -->
<?php include(RUTA_APP . "/vistas/inc/header_V.php"); ?>

		<div class="container contenedor_1">
            <div class="contenedor_28">
                <div class="contenedor_19">
                    <img class="imagen_14 " alt="Fotografia Pablo Cabeza" src="<?php echo RUTA_URL;?>/public/images/Fot_PabloCabeza.jpg">
                    <label class="label_2">Pablo Cabeza</label>
                    <label class="label_3">Programador BackEnd de aplicaciones web</label>
                    <label class="label_3">Desarrollador de software</label>
                    <label class="label_3">T.S.U. Mecánica térmica</label> 
                </div>            
                <p class="p_3">Como te dije antes, no esta en mis manos dar la solución a los problemas reportados en esta plataforma, es asunto de los que gobiernan, sin embargo, me veo tentado a enfrentar estos fallos y esclarecer porque suceden sin césar; por eso al final de esta página tengo una encuesta de una unica pregunta, a ver si hago una postulación como alcalde del Municipio San Felipe del estado Yaracuy.</p>

                <h2 class="h2_3 h2_2">Seis datos sobre mí</h2>
                <ol>
                    <li class="li_2">Actualmente trabajo como desarrollador de software y quiero aportar mis conocimiento en tecnología para impactar positivamente a nuestro municipio, al estado y al país. Un ejemplo de esto, es esta plataforma de denuncias, la cual desarrollé y formo parte activa del equipo de trabajo de este proyecto único en el país.</li>

                    <li class="li_2">Otro proyecto social inedito en nuestro país que tengo listo y que mejorará significativamente el servicio de atención en salud publica y privada, es una plataforma digital que administra historias médicas, interconecta centros de salud y permite el agendamiento de citas por medio de la nube, esta plataforma para entrar en producción solo faltan los permisos necesarios para que los centros de salud que se encuentren dentro del municipio tanto publicos como privados puedan correrla, en el futuro pudiesemos extenderla al pais entero.</li>

                    <li class="li_2">Para gestionar nuestra alcaldía estoy diseñando la arquitectura de un sistema digital para administrar los impuestos, el catastro, las tierras, el parque automotar, la gestión de la basura, la distribución del agua, la gestión del Clap, el presupuesto del municipio entre otras responsabilidades, la cual sera totalmente accesible a la ciudadania para trabaja con datos abiertos.</li>

                    <li class="li_2">Por otro lado tengo estudios universitarios en Mecánica Térmica, por lo que domino muy bien temas de gestión y administración de recursos energeticos y mantenimiento general de infraestructura física, maquinaria y equipos.</li>
                    
                    <li class="li_2">Con respecto a la actual crisis, debemos sacar provecho que el planeta esta construido bajo software, de modo  que podemos obtener recursos adicionales exportando productos y servicios digitales creados en la alcaldía por medio de una división de diseño de software con talento sanfelipeño principalmente, ofrecerlos al gobierno central o realizando convenios con otros paises a cambio de recursos economicos o especies.</li>

                    <li class="li_2">Y por ultimo soy atleta aficionado, asi que todos los días podremos salir juntos a corre 5K, 10K ó 30K por las avenidas de nuestro municipio.</li>
                </ol>
            </div>
            <div class="contenedor_22">
                <p class="p_2">¿Tendrias intención de voto a mi favor, si me postulo a alcalde del municipio San Felipe?</p>            
                <div class="contenedor_23">        
                    <div class="contenedor_24">
                        <label class="btn btn-primary boton_1 boton_2" onclick="encuesta()">Si</label>
                    </div>
                    <div class="contenedor_24">
                        <label class="btn btn-primary boton_1 boton_2" onclick="location.href='../Inicio_C'">No</label>
                    </div>
                    <div class="contenedor_25">
                            <label class="label_3">Electores que me apoyan</label>
                            <input class="input_1" type="text" value="<?php echo $Datos?>" readonly>
                    </div>
                </div>
            </div>
		</div>
           
<?php   
//  Se carga el footer 
    require(RUTA_APP . "/vistas/inc/footer_V.php");
?>