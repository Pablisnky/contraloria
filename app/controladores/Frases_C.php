<?php
    session_start();
    
    class Frases_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index(){           
            $this->vista("paginas/frases_V");
        }
    }
?>    