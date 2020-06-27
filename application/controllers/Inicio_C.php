<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Inicio_C extends CI_Controller{// CI_Controller es una clase propia de codeigniter

        public function __construct(){
            parent::__construct();  
            $this->load->helper('url'); //necesario por site_url() en la vista            
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otro metodo
        public function index(){
            //Mediante el objeto load y el método view() de CI_Controller, se cargan las vista
            $this->load->view('inc/header_V');
            $this->load->view('paginas/inicio_V');
            $this->load->view('inc/footer_V');
        }
    }
?>    