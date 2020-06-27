<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Estadisticas_C extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url'); //necesario por site_url() en la vista
            $this->load->model('Estadistica_M'); //Se instancia el objeto Estadistica_M
        }

        //En ausencia de metodo cargara este por defecto
        public function index(){
            //Mediante el objeto load y el método view() de CI_Controller, se cargan las vista
            $this->load->view('inc/header_V');
            $this->load->view('paginas/estadistica_V');
            $this->load->view('inc/footer_V');
        }

        //Metodo llamado desde acuseDenuncia_V.php
        // public function indicadores($CodigoDenuncia){
        //     //Se CONSULTA los datos de la denuncia
        //     $Denuncia= $this->ConsultaEstadistica_M->consultarDatosDenuncia($CodigoDenuncia);
        //     // print_r($Denuncia);

        //     $Datos = $Denuncia;
        //     $this->vista("paginas/estadistica_Indicadores_V", $Datos);
        // }

        //Metodo llamado desde Funciones_Ajax.js llamar_EstadisticasParroquia()
        public function resultados($Estado, $Municipio, $Parroquia){
            //Se elimina el caractr %20 de los espacios enblanco de la cadena
            $Estado = urldecode($Estado);
            $Municipio = urldecode($Municipio);
            $Parroquia = urldecode($Parroquia);

            //Se CONSULTA las denuncias según la seleccion del usuario
            $result = $this->Estadistica_M->consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia);
            // print_r($result);

            $data = array('consulta' => $result);
                    
            //Mediante el objeto load y el método view() de CI_Controller, se cargaran las vistas
            $this->load->view('paginas/Parroquias_V', $data);
        }
    }
?>