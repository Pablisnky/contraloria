<?php
	class CerrarS_C extends Controlador{
		public function __construct(){
			echo "Se ha cargado el controlador \"CerrarS_C\"";
			echo "<br>";
			session_start(); 
			session_unset();
			session_destroy();
		}
		
        //Siempre cargara el metodo por defecto sino se pasa un metodo especifico
        public function index(){
            echo "Carga el metodo por defecto correspondiente a este controlador";            
			// echo '<script type="text/javascript">window.location="'. RUTA_URL.' "</script>';
			
            //Se redirije a la pagina 
        	header("location:" . RUTA_URL);
        }
	}
?> 