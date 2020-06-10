<?php
    session_start();

    class Ubicacion_C extends Controlador{
        public function __construct(){            
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
            $this->ConsultaUbicacion_M = $this->modelo("Ubicacion_M");           
        }
        
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php o de Login_C
        public function index($Parametros){
            //Sesion creada en Login_C/ValidarSesion
            if(isset($_SESSION["ID_Afiliado"])){
                //En $Parametros se tienen dos parametros
                // echo "Parametros desde el if " . $Parametros;
                $Datos = $Parametros;
                $this->vista("paginas/ubicacion_V", $Datos);
            }
            else{
                // echo "Parametros desde el else " .  $Parametros;
                header("location:" . RUTA_URL . "/Login_C/index/" .$Parametros);     
            }
        }

        public function recibeUbicacion(){            
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST"){//si son enviados por POST, entra aqui
                $RecibeDatos = [
                    'Estado' => ucfirst($_POST["estado"]),
                    'Municipio' => ucfirst($_POST["municipio"]),
                    'Parroquia' => ucfirst($_POST["parroquia"]),
                    'Direccion' => strtolower($_POST["direccion"]),
                    'Sector_Servicio' => strtolower($_POST["sector_servicio"])
                ];
            }
            print_r($RecibeDatos);
            // echo "<br>";
            // $Sector_Servicio = $RecibeDatos['Sector_Servicio'];

            $RecibeDatos = implode(",", $RecibeDatos);
            echo $RecibeDatos;
            //En $Sector_Servicio se tiene un string, se convierte en array
            // $Parametros = explode(',' , $Sector_Servicio);
            // print_r($Parametros);
         
            //Se INSERTAN los datos en la BD
            // $this->ConsultaUbicacion_M->insertarUbicacion($RecibeDatos);

            //Redirecciona, La función redireccionar se encuentra en url_helper.php
            // redireccionar("/Detalle_C/index/" . $RecibeDatos . $Sector . $Servicio);
            
            header("location:" . RUTA_URL . "/Detalle_C/index/" . $RecibeDatos);  
        }
    }
?>    