<?php
    session_start();

    class Infografia_C extends Controlador{

        public function __construct(){
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD
            // $this->ConsultaInfografia_M = $this->modelo("Infografia_M");
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe desde grafics_V
        public function index(){
            //$DatosAgrupados contiene una cadena con las variable estado, municipio, parroquia, servicio y fecha separados por coma, se convierte en array para separar los elementos
            // $DatosAgrupados = explode(",", $DatosAgrupados);
            // $Estado = $DatosAgrupados[0];
            // $Municipio = $DatosAgrupados[1];
            // $Parroquia = $DatosAgrupados[2];
            // $Servicio = $DatosAgrupados[3];
            // $FechaConsulta = $DatosAgrupados[4];

            // //Se CONSULTA las denuncias para el periodo seleccionado (semanal,quincenal,mensual)
            // $Indicadores_2 = $this->ConsultaGrafico_M->consultarDetallesIndicadores($Estado, $Municipio, $Parroquia, $Servicio, $FechaConsulta);

            // $Datos = $Indicadores_2;

            $this->vista("paginas/infografia_V");
        }
    }
?>