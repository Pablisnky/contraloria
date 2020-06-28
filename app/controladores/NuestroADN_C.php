<?php
    
    class NuestroADN_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index(){           
            $this->vista("paginas/nuestroADN_V");
        }
    }
?>    