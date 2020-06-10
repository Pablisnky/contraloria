<?php
    session_start();

    class AcuseDenuncia_C extends Controlador{
        public function __construct(){            
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
            $this->ConsultaAcuse_M = $this->modelo("AcuseDenuncia_M");           
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde detalles_C.php
        public function index(){            
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST"){//si son enviados por POST, entra aqui
                $RecibeVarios = [
                    'Fallo' => ucfirst($_POST["falloAgua"]),
                    'Varios_datos' => strtolower($_POST["varios_datos"])
                ];
            }
            //   print_r($RecibeVarios);
            // echo "<br>";
            $RecibeVarios = implode(",", $RecibeVarios);
            // echo $RecibeVarios . "<br>";
            $RecibeVarios = explode(",", $RecibeVarios);
            // print_r($RecibeVarios);
            $CodigoFallo = $RecibeVarios[0];
            // echo  "<br>";
            $ID_Afiliado = $_SESSION["ID_Afiliado"];

            //Se CONSULTA que el usuario no haya realizado la misma denuncia en un lapso de 20 días
            $CodigoDenuncia = $this->ConsultaAcuse_M->consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo);
            // echo "La cantidad de filas es: " . $CodigoDenuncia;

            if($CodigoDenuncia == 0){
                // Se genera un aleatorio para insertarlo junto a la ubicacion, por medio de este se relaciona la ubicacion con el servicio denunciado
                mt_srand (time());
                $this->Aleatorio = mt_rand(1000000,999999999);
                // echo "Aleatorio= " . $this->AleatorioUbicacion . "<br>";
                
                //Se INSERTAN los datos de ubicacion geografica en la BD
                $this->ConsultaAcuse_M->insertarUbicacion($RecibeVarios, $this->Aleatorio);
                
                //Se CONSULTA el ID_Ubicacion que se acaba de ingresa en la BD
                $ID_Ubicacion = $this->ConsultaAcuse_M->consultarID_Ubicacion($this->Aleatorio);
                //  print_r($ID_Ubicacion);
                $Datos=[
                    "ID_Ubicacion" => $ID_Ubicacion,
                ];
                
                foreach($Datos["ID_Ubicacion"] as  $usuario){
                    $ID_Ubicacion = $usuario->ID_Ubicacion;
                    // echo "ID_Ubicacion: " . $ID_Ubicacion  . "<br>"; 
                } 
                // var_dump($Datos['ID_Ubicacion']);

                //Se añaden 20 días a la fecha de la denuncia
                $fecha = date('Y-m-j');
                $FechaCaducidad = strtotime ('+19 day' , strtotime($fecha)) ;
                $FechaCaducidad = date ('Y-m-j' , $FechaCaducidad);
                // echo $FechaCaducidad;

                //Se INSERTAN los datos de sector, servicio, ubicacion, codigo y usuario sen la BD
                $this->ConsultaAcuse_M->insertarCodigoDenuncia($this->Aleatorio, $ID_Afiliado, $ID_Ubicacion, $RecibeVarios, $FechaCaducidad);

                $this->vista("paginas/acuseDenuncia_V");
            }
            else{
                $Datos = "alerta";
                $this->vista("paginas/acuseDenuncia_V", $Datos);
            }
        }
    }
?>   