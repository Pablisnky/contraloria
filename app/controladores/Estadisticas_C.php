<?php
    session_start();

    class Estadisticas_C extends Controlador{
        public $Estado;
        public $Municipio;
        public $Parroquia;
        public $Frecuencia;

        public function __construct(){
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD
            $this->ConsultaEstadistica_M = $this->modelo("Estadistica_M");
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php
        public function index(){
            $this->vista("paginas/estadistica_V");
        }

        //Metodo llamado desde Funciones_Ajax.js
        public function resultados($Estado, $Municipio, $Parroquia, $Frecuencia){
            $this->Estado = $Estado;
            $this->Municipio = $Municipio;
            $this->Parroquia = $Parroquia;
            $this->Frecuencia = $Frecuencia;

            $this->Frecuencia($this->Frecuencia);
        }

        //Este metodo es llamado desde Estadisticas_V/resultados, a la final no era necesario hacerlo, podia estar unido con el metodo cargar() mas abajo y el metodo resultados de arriba 
        public function Frecuencia($Frecuencia){
            //Se saca la cuenta de la fecha que se debe mandar a la consulta segun la frecunecia socilicitada (semanal, quincenal, mensual)
            switch($Frecuencia){
                case "Semanal": 
                    //se calcula que fecha era 7 dias atras
                    $fecha = date('Y-m-d');
                    $FechaConsulta = strtotime ('-7 day' , strtotime($fecha)) ;
                    $FechaConsulta = date ('Y-m-j', $FechaConsulta);
                    $_SESSION['Fecha'] =  $FechaConsulta;
                    // echo "La sesion es: " . $_SESSION['Fecha'] ;
                break;
                case "Quincenal": 
                    $fecha = date('Y-m-d');
                    $FechaConsulta = strtotime ('-15 day' , strtotime($fecha)) ;
                    $FechaConsulta = date ('Y-m-j', $FechaConsulta);
                    $_SESSION['Fecha'] =  $FechaConsulta;
                    // echo "La sesion es: " . $_SESSION['Fecha'] ;
                break;
                case "Mensual": 
                    $fecha = date('Y-m-d');
                    $FechaConsulta = strtotime ('-30 day' , strtotime($fecha)) ;
                    $FechaConsulta = date ('Y-m-j', $FechaConsulta);
                    $_SESSION['Fecha'] =  $FechaConsulta;
                    // echo "La sesion es: " . $_SESSION['Fecha'] ;
                break;
            }
            $this->Cargar($this->Estado, $this->Municipio, $this->Parroquia, $FechaConsulta);
        }   

        public function Cargar($Estado, $Municipio, $Parroquia, $FechaConsulta){
            //Se CONSULTA las denuncias para el periodo seleccionado (semanal,quincenal,mensual)
            $Indicadores = $this->ConsultaEstadistica_M->consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia, $FechaConsulta);
                      
            $Datos = $Indicadores ;
        
            $this->vista("paginas/estadistica_Ind_Parro_V", $Datos);
        }
    }
?>