<?php
    class Inicio_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo
        public function index(){
            $this->vista("paginas/inicio_V");
        }
    }
?>    