<?php
    session_start();
    
    class NuestroADN_C extends Controlador{
        
        public function __construct(){           
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente  que se comunica con la BD 
            $this->ConsultaAlcaldia_M= $this->modelo("Alcaldia_M");
        }

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index(){           
            $this->vista("paginas/quienesSomos_V");
        }

        public function queHacemos(){
            $this->vista("paginas/queHacemos_V");
        }

        public function contactenos(){
            $this->vista("paginas/contactenos_V");
        }

        public function pablins_Ky(){
            // Se CONSULTA la cantidad de electores que apoyan para la alacaldia
            $Consulta= $this->ConsultaAlcaldia_M->consultarApoyoConfirmado();
            while($arr = $Consulta->fetch(PDO::FETCH_ASSOC)){
                $Datos = $arr['Total'];
            }

            $this->vista("paginas/pablins_Ky_V", $Datos);
        }

        public function encuesta(){
            $this->vista("paginas/encuesta_V");
        }
        
        public function recibeEncuesta(){          
            // Se recibe la cedula, desde encuesta_V.php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["cedula"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Cedula' => filter_input(INPUT_POST, "cedula", FILTER_SANITIZE_STRING),
                ];
                // print_r($RecibeDatos);
                // echo "<br><br>";

                $RecibeDatos = [                      
                        'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                ];
                // print_r($RecibeDatos);
                // echo "<br><br>"; 
                // echo "<br><br>";
                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                if($RecibeDatos["Cedula"] == false){      
                    echo "La cedula debe ser solo números";
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //Se CONSULTA si el usuario es elector del municipio San Felipe
            $usuarios_1= $this->ConsultaAlcaldia_M->consultarCNE($RecibeDatos["Cedula"]);
            while($arr = $usuarios_1->fetch(PDO::FETCH_ASSOC)){
                $CNE = $arr['Total'];            
                $Nombre = $arr['nombre'];    
            }
            if($CNE == 0){//No es elector del municipio
                $Datos = ['cne'];
                $this->vista("paginas/encuesta_V", $Datos);
            }
            else{
                //Se CONSULTA  que el usuario no haya manifestado su apoyo antes
                $usuarios_2= $this->ConsultaAlcaldia_M->consultarApoyoPostulacion($RecibeDatos["Cedula"]);
                while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                    $Participo = $arr['Total'];
                }

                if($Participo == 0){
                    //Se INSERTAN los datos en la BD
                    $this->ConsultaAlcaldia_M->insertarApoyoPostulacion($RecibeDatos);
                    $Datos = ['agradecimiento', $Nombre];
                    $this->vista("paginas/encuesta_V", $Datos);
                }
                else{
                    $Datos = ['participo', $Nombre];
                    $this->vista("paginas/encuesta_V", $Datos);
                }
            }
        }
    }
?>    