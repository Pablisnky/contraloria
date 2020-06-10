<?php
    session_start();
    
    class Detalle_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index($RecibeDatos){ 
            $Datos = $RecibeDatos;           
            $this->vista("paginas/detalles_V", $Datos);
        }
    }
?>    