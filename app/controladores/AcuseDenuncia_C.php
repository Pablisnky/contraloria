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

            if($CodigoDenuncia == 0){//El usuario no ha realizado la denuncia antes
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
                $fecha = date('Y-m-d');
                // echo $fecha . "<br>";
                $FechaCaducidad = strtotime ('+20 day' , strtotime($fecha)) ;
                $FechaCaducidad = date ('Y-m-j' , $FechaCaducidad);
                //  echo $FechaCaducidad;
           
                //Se INSERTAN los datos de sector, servicio, ubicacion, codigo y usuario sen la BD
                $this->ConsultaAcuse_M->insertarCodigoDenuncia($this->Aleatorio, $ID_Afiliado, $ID_Ubicacion, $RecibeVarios, $FechaCaducidad);
                
                $this->vista("paginas/acuseDenuncia_V");
            }
            else{//El usuario ya realizo esta denuncia
                //Se CONSULTA la fecha de denuncia, la fecha de caducidad y e código de denuncia
                $fecha = $this->ConsultaAcuse_M->consultarFecha($ID_Afiliado, $CodigoFallo);
                // print_r($fecha);
                
                $Datos=[
                    "fechas" => $fecha,
                ];
                
                foreach($Datos["fechas"] as $Fecha){
                    $Fecha_Ca = $Fecha->fechaCaducidad;
                    $Fecha_De = $Fecha->fechaDenuncia;
                    $Codigo = $Fecha->aleatorio;  
                    // echo "Fecha denuncia" . $Fecha_De ."<br>";
                    // echo "Fecha caducidad" . $Fecha_Ca ."<br>";
                } 

                //Se cambia el formato de fecha de denuncia para el calculo de los dias
                $Fecha_De = date('Y-m-d', strtotime($Fecha_De));
                // echo "Fecha denuncia" . $Fecha_De ."<br>";
                //Se calculan la diferencia en dias
                $date1 = new DateTime($Fecha_De);
                $date2 = new DateTime($Fecha_Ca);
                $diff = $date1->diff($date2);  
                $Dias = $diff->d;
                
                //Se cambia el formato de la fecha de denuncia, solo para mostar en pantalla
                $Fecha_De = date('d-m-Y', strtotime($Fecha_De));

                $Datos = [$Fecha_De, $Dias, $Codigo];
                $this->vista("paginas/acuseDenuncia_V", $Datos);
            }
        }
    }
?>   