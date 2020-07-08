<?php
    session_start();
    
    class NuestroADN_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index(){           
            $this->vista("paginas/quienesSomos_V");
        }

        public function queHacemos(){
            $this->vista("paginas/queHacemos_V");
        }

        public function contactenos(){
            $this->vista("paginas/contactenos_V");
        }

        public function pablins_Ky(){
            $this->vista("paginas/pablins_Ky_V");
        }

        public function encuesta(){
            $this->vista("paginas/encuesta_V");
        }
        
    }
?>    