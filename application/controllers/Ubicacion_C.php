<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Ubicacion_C extends CI_Controller{
        public function __construct(){  
            parent::__construct();              
            $this->load->helper('url'); //necesario por redirect() y por site_url() en la vista         
            $this->load->helper('html'); //necesario por link_tag()    
            $this->load->library('session');
            echo link_tag('public/css/estilosContraloria.css');           
        }
        
        //En ausencia de metodo cargara este por defecto; los parametros los recibe de inicio_V.php - Login_C  -  login_Vrecord.php
        public function index($Sector, $Servicio){
            //Sesion creada en Login_C/ValidarSesion
            if($this->session->userdata('logueado')){
                
                $data = array(
                    'sector' => $Sector,
                    'servicio' => $Servicio,
                );

                //Mediante el objeto load y el método view() de CI_Controller, se cargaran las vistas
                $this->load->view('inc/header_V');
                $this->load->view('paginas/ubicacion_V', $data);
                $this->load->view('inc/footer_V');
            }
            else{
                // echo "Los parametros son: " . $Sector . "/". $Servico;
                redirect("/Login_C/index/$Sector/$Servicio",'refresh');   
            }
        }

        public function recibeUbicacion(){           
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["estado"]) && !empty($_POST["municipio"]) && !empty($_POST["parroquia"]) && !empty($_POST["direccion"]) && !empty($_POST["sector"]) && !empty($_POST["servicio"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Estado' => ucfirst($_POST["estado"]),
                    'Municipio' => $_POST["municipio"],
                    'Parroquia' => ucfirst($_POST["parroquia"]),
                    'Direccion' => mb_strtolower($_POST["direccion"]),
                    'Sector' => mb_strtolower($_POST["sector"]),
                    'Servicio' => mb_strtolower($_POST["servicio"]),
                    'logueado_2' => TRUE
                ];
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            // print_r($RecibeDatos);
            // echo "<br>";

            //se crea una sesion que almacena lo enviado por el formulario
            $this->session->set_userdata($RecibeDatos);
            redirect("/Detalle_C/index/",'refresh');   
        }
    }
?>    