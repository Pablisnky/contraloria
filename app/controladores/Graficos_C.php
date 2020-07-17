<?php
    session_start();

    class Graficos_C extends Controlador{

        public function __construct(){
            //Se instancia un objeto que se comunica con la BD
            $this->ConsultaGrafico_M = $this->modelo("Grafico_M");
        }

        //solo sino se solicita otra metodo, los parametros los recibe de Funciones_varias.js por medio de la función AbrirPresentacion()
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con las variable estado, municipio, parroquia, servicio y fecha separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            // print_r($DatosAgrupados);
            
            $Estado = $DatosAgrupados[0];
            $Municipio = $DatosAgrupados[1];
            $Parroquia = $DatosAgrupados[2];
            $Zona = $DatosAgrupados[3];
            $FechaConsulta = $DatosAgrupados[4];
            $Servicio = $DatosAgrupados[5];

            //Se CONSULTA los detalles de denuncias para el periodo seleccionado de un servicio especifico (semanal,quincenal,mensual)
            $Indicadores_2 = $this->ConsultaGrafico_M->consultarDetallesIndicadores($Estado, $Municipio, $Parroquia, $Zona, $FechaConsulta, $Servicio);

            $Datos = $Indicadores_2;
            $Datos = $Datos->fetchAll(PDO::FETCH_ASSOC);
                       
            foreach($Datos as $row){
                $Estado = $row['estado'];
                $Municipio = $row['municipio'];
                $Parroquia = $row['parroquia'];
                $Zona = $row['zona'];
                $Direccion = $row['direccion'];
                $Fecha = $row['fechaDenuncia'];
                $Hora = $row['horaDenuncia'];
                $Servicio = $row['servicio'];
                $Descripcion = $row['descripcionFallo'];
            }

            $this->vista("paginas/graficos_V", $Datos);
        }
    }
?>