<?php
    session_start();

    class Ubicacion_C extends Controlador{
        // public function __construct(){            
        //     //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
        //     $this->ConsultaUbicacion_M = $this->modelo("Ubicacion_M");           
        // }
        
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php - Login_C  -  login_Vrecord.php
        public function index($Parametros){
            //Sesion creada en Login_C/ValidarSesion
            if(isset($_SESSION["ID_Afiliado"])){
                //En $Parametros se tienen dos parametros el sector y el servicio
                // echo "Parametros desde el if " . $Parametros;
                $Datos = $Parametros;
                $this->vista("paginas/ubicacion_V", $Datos);
            }
            else{
                // echo "Parametros desde el else " .  $Parametros;
                header("location:" . RUTA_URL . "/Login_C/index/" . $Parametros);     
            }
        }

        public function recibeUbicacion(){            
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["estado"]) && !empty($_POST["municipio"]) && !empty($_POST["parroquia"]) && !empty($_POST["direccion"]) && !empty($_POST["sector_servicio"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Estado' => ucfirst($_POST["estado"]),
                    'Municipio' => $_POST["municipio"],
                    'Parroquia' => ucfirst($_POST["parroquia"]),
                    'Direccion' => mb_strtolower($_POST["direccion"]),
                    'Sector_Servicio' => mb_strtolower($_POST["sector_servicio"])
                ];
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            
            $RecibeDatos = implode(",", $RecibeDatos);

            header("location:" . RUTA_URL . "/Detalle_C/index/" . $RecibeDatos);  
        }
    }
?>    