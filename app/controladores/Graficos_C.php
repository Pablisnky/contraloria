<?php
    session_start();

    class Graficos_C extends Controlador{

        public function __construct(){
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD
            $this->ConsultaGrafico_M = $this->modelo("Grafico_M");
        }


        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de estadisticas_Ind_Parro_V.php
        public function index($Datos){
            //Se extren los valores de estado, municipio, parroquia y servicio dela variable $Datos
            $array = explode(",", $Datos);

            $Estado = $array[0];
            $Municipio = $array[1];
            $Parroquia = $array[2];
            $Servicio = $array[3];
            $FechaConsulta = $_SESSION['Fecha']; 

            //Se CONSULTA las denuncias para el periodo seleccionado (semanal,quincenal,mensual)
            $Indicadores_2 = $this->ConsultaGrafico_M->consultarDetallesIndicadores($Estado, $Municipio, $Parroquia, $Servicio, $FechaConsulta);

            $Datos = $Indicadores_2;

            $this->vista("paginas/graficos_V", $Datos);
        }


    }
?>