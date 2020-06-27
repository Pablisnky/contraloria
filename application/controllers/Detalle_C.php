<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Detalle_C extends CI_Controller{

        public function __construct(){  
            parent::__construct();    
            $this->load->helper('url'); //necesario por site_url() en la vista  
        }

        //En ausencia de metodo cargara este por defecto; es llamado desde Ubicacion_C/recibeUbicacion
        public function index(){      
            //Sesion creada en Ubicacion_C/recibeUbicacion
            if($this->session->userdata('logueado_2')){
                $data = array();
                $data['servicio'] = $this->session->userdata('Servicio');
            } 
            // print_r($data['servicio']);

            switch($data['servicio']){
                case "aguapotable": 
                    // Se carga la vista en este mismo metodo, "ojo" no redirecciona
                    $this->load->view('inc/header_V');
                    $this->load->view('fallosPorServicios/fallos_aguaPotable_V');
                break;
                case "aguaservida": 
                    // Se carga la vista en este mismo metodo, "ojo" no redirecciona
                    $this->load->view('inc/header_V');
                    $this->load->view('fallosPorServicios/fallos_aguaServida_V');
                break;
            }        
        }
    }
?>    