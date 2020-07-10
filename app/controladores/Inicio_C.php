<?php
    session_start();
    
    class Inicio_C extends Controlador{
        
        public function __construct(){           
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente  que se comunica con la BD 
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo
        public function index(){            
            //Se CONSULTA la cantidad de denuncias realiazadas el día de hoy
            $Denuncias = $this->ConsultaInicio_M->consultarDenunciaDiaria();
            while($arr = $Denuncias->fetch(PDO::FETCH_ASSOC)){
                $Num_Deuncias = $arr['Total'];
                // echo $Num_Deuncias;
            }
            
            $this->vista("paginas/inicio_V", $Num_Deuncias);
        }
        
        //Metodo cargado desde header_V
        public function denuncias(){
            $this->vista("paginas/denuncias_V");
        }
    }
?>    