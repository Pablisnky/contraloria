<?php
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Error_404_C extends CI_Controller { 
        public function index(){
            echo 'Error 404. Usted está intentando acceder a una página que no existe.';
        }
    }