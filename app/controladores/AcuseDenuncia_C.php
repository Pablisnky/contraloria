<?php
    session_start();

    class AcuseDenuncia_C extends Controlador{
        
        public function __construct(){            
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
            $this->ConsultaAcuse_M = $this->modelo("AcuseDenuncia_M");           
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde detalles_V.php
        public function index(){            
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["falloAgua"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeVarios = [
                    'Fallo' => ucfirst($_POST["falloAgua"]),
                    'Varios_datos' => mb_strtolower($_POST["varios_datos"]),
                    'DescribeProblema' => $_POST["descripcionFallo"]
                ];
            }
            else{
                echo "Especifique el problema a denunciar";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            // print_r($RecibeVarios);//Los string los convierte a minusculas y elimina los espacios, esto es un problema por ejemplo para los municipios como "San Felipe"
            //  echo "<br>";
            //Se convierte el array en un string con sus valores separado por comas
            $RecibeVarios = implode(",", $RecibeVarios);
            // echo $RecibeVarios . "<br>";
            //Se convierte al string en un array de indices numericos
            $RecibeVarios = explode(",", $RecibeVarios);
            // print_r($RecibeVarios);

            $CodigoFallo = $RecibeVarios[0];
            $Estado = $RecibeVarios[1];
            $Municipio = $RecibeVarios[2];
            $Parroquia = $RecibeVarios[3];
            
            $ID_Afiliado = $_SESSION["ID_Afiliado"];
           
            //Se CONSULTA que el usuario no haya realizado la misma denuncia en la misma parroquia un lapso de 20 días
            $CodigoDenuncia = $this->ConsultaAcuse_M->consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo, $Estado, $Municipio,$Parroquia);
            //  echo "La cantidad de filas es: " . $CodigoDenuncia . "<br>";
            //  print_r($CodigoDenuncia);

            if($CodigoDenuncia == 0){//El usuario no ha realizado la denuncia antes
                // Se genera un aleatorio para insertarlo junto a la ubicacion, por medio de este se relaciona la ubicacion con el servicio denunciado
                mt_srand (time());
                $this->Aleatorio = mt_rand(1000000,999999999);
                // echo "Aleatorio= " . $this->AleatorioUbicacion . "<br>";
                
                //Se INSERTAN los datos de ubicacion geografica en la BD
                $this->ConsultaAcuse_M->insertarUbicacion($RecibeVarios, $this->Aleatorio);
                
                //Se CONSULTA el ID_Ubicacion que se acaba de ingresa en la BD
                $ID_Ubicacion = $this->ConsultaAcuse_M->consultarID_Ubicacion($this->Aleatorio);
                
                foreach($ID_Ubicacion as $usuario){
                    $ID_Ubicacion = $usuario['ID_Ubicacion'];
                    //  echo "ID_Ubicacion: " . $ID_Ubicacion  . "<br>"; 
                } 

                //Se añaden 20 días a la fecha de la denuncia
                $fecha = date('Y-m-d');
                // echo $fecha . "<br>";
                $FechaCaducidad = strtotime ('+20 day' , strtotime($fecha)) ;
                $FechaCaducidad = date ('Y-m-j' , $FechaCaducidad);
                //   echo $FechaCaducidad;
           
                //Se INSERTAN la descripcion de la denuncia sector publico, servicio, ubicacion, codigo de denuncia y usuario en la BD
                $this->ConsultaAcuse_M->insertarDescripcionDenuncia($this->Aleatorio, $ID_Afiliado, $ID_Ubicacion, $RecibeVarios, $FechaCaducidad);
                
                $this->vista("paginas/acuseDenuncia_V");
            }
            else{//El usuario ya realizo esta denuncia
                //Se CONSULTA la fecha de denuncia, la fecha de caducidad y e código de denuncia
                $fecha = $this->ConsultaAcuse_M->consultarFecha($ID_Afiliado, $CodigoFallo);
                // print_r($fecha);
                while($arr = $fecha->fetch(PDO::FETCH_ASSOC)){
                    $FechaCaducidad = $arr['fechaCaducidad'];
                    $FechaDenuncia = $arr['fechaDenuncia'];
                    $Aleatorio = $arr['aleatorio'];
                }

                // echo "Fecha denuncia: " . $FechaDenuncia ."<br>";
                // echo "Fecha caducidad: " . $FechaCaducidad ."<br>";
                // echo "Aleatorio: " . $Aleatorio ."<br>";
                   
                //Se determina el día actual para el calculo de dias restantes
                $FechaActual = date("Y-m-d");
                // echo "Fecha actual: " .  $FechaActual ."<br>";
                //Se calculan la diferencia en dias
                $date1 = new DateTime($FechaActual);
                $date2 = new DateTime($FechaCaducidad);
                $diff = $date1->diff($date2); 
                // print_r($diff); 
                $Dias = $diff->d;
                
                // echo $Dias;
                //Se cambia el formato de la fecha de denuncia, solo para mostar en pantalla
                $Fecha_De = date('d-m-Y', strtotime($FechaDenuncia));

                $Datos = [$Fecha_De, $Dias, $Aleatorio];
                $this->vista("paginas/acuseDenuncia_V", $Datos);
            }
        }
    }
?>   