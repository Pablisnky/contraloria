<?php
    session_start();
    
    class Inicio_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo
        public function index(){
            $this->vista("paginas/inicio_V");
        }
        
        //Metodo cargado desde header_V
        public function denuncias(){
            $this->vista("paginas/denuncias_V");
        }
    }
?>    