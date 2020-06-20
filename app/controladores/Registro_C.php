<?php
    class Registro_C extends Controlador{
        public function __construct(){            
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
            $this->ConsultaRegistro_M = $this->modelo("Registro_M");           
        }
        
        //Siempre cargara el metodo por defecto sino se pasa un metodo especifico
        public function index(){
            // echo "Carga la vista por defecto correspondiente a este controlador: registro_V"  . "<br>";

            //Carga la vista 
            $this->vista("paginas/registro_V");
        }
   
        public function recibeRegistro(){            
            //Captura todos los campos del formulario, se recibe desde .php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["cedula"]) && !empty($_POST["telefono"]) && !empty($_POST["correo"]) && !empty($_POST["clave"]) && !empty($_POST["confirmarClave"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Nombre' => filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING),
                    'Cedula' => filter_input(INPUT_POST, "cedula", FILTER_SANITIZE_STRING),
                    'Telefono' => filter_input(INPUT_POST, "telefono", FILTER_SANITIZE_STRING),
                    'Correo' => filter_input(INPUT_POST, "correo", FILTER_SANITIZE_STRING),
                    'Clave' => filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING), 
                    'RepiteClave' => filter_input(INPUT_POST, "confirmarClave", FILTER_SANITIZE_STRING),
                ];
                // print_r($RecibeDatos);
                // echo "<br><br>";
                $RecibeDatos = [
                        'Nombre' => ucwords($_POST["nombre"]),                       
                        'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                        'Telefono' => is_numeric($_POST["telefono"]) ? $_POST["telefono"]: false,
                        'Correo' => mb_strtolower($_POST["correo"]),  
                        'Clave' => $_POST["clave"],
                        'RepiteClave' => $_POST["confirmarClave"],
                ];
                // print_r($RecibeDatos);
                // echo "<br><br>"; 
                // echo "<br><br>";
                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                if($RecibeDatos["Telefono"] == false){      
                    exit("El telefono debe ser solo números");
                }
                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                if($RecibeDatos["Cedula"] == false){      
                    exit("La cedula debe ser solo números");
                }

            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            
            //Se INSERTAN los datos en la BD
            $this->ConsultaRegistro_M->insertarUsuario($RecibeDatos);

            //se cifran la contraseña con un algoritmo de encriptación
            $ClaveCifrada= password_hash($RecibeDatos["Clave"], PASSWORD_DEFAULT);
            // echo "La clave cifrada: " . $ClaveCifrada . "<br>";

            //Se CONSULTA el ID_Afiliado del participante registrados en el sistema con la Cedula dado como argumento
            $ID_Afiliado= $this->ConsultaRegistro_M->consultarUsuario($RecibeDatos['Cedula']);
            $Datos=[
                "ID_Afiliado" => $ID_Afiliado,
            ];
            // print_r($ID_Afiliado);
            // echo "<br>";

            //Se INSERTA el ID_Afiliado en la tabla usuario para almacenar la contraseña.
            $this->ConsultaRegistro_M->insertarClaveUsuario($Datos, $ClaveCifrada);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Inicio_C/");
        }
    }
?>    