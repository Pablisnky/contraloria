<?php
   if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Inicio_C extends CI_Controller{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo
        public function index(){
            // $this->vista("paginas/inicio_V");
            echo "HOLA";
        }
    }
?>    