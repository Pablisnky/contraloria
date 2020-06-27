<?php
    class Registro_C extends CI_Controller{
        public function __construct(){            
            parent::__construct(); 
            $this->load->helper('url'); //necesario por site_url() en la vista                      
        }
        
        //En ausencia de metodo cargara este por defecto; es llamadao desde registro_V
        public function index(){ 
            //Mediante el objeto load y el método view() de CI_Controller, se cargaran las vistas
            $this->load->view('inc/header_V');
            $this->load->view('paginas/registro_V');
        }
   
        public function recibeRegistro(){            
            //Captura todos los campos del formulario, se recibe desde registro_V.php 
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
            $this->load->model('Registro_M');
            $Insercion = $this->Registro_M->insertarUsuario($RecibeDatos);
            print_r($Insercion);

            //se cifran la contraseña con un algoritmo de encriptación
            $ClaveCifrada= password_hash($RecibeDatos["Clave"], PASSWORD_DEFAULT);
            echo "La clave cifrada: " . $ClaveCifrada . "<br>";

            //Se CONSULTA el ID_Afiliado del participante registrados en el sistema con la Cedula dado como argumento
            $usuarios = $this->Registro_M->consultarUsuario($RecibeDatos['Cedula']);
            print_r($usuarios);
            echo "<br>";
            
            $RecibeDatos_2 = [
                'id_usuario' => $usuarios, 
            ];
            
            foreach($RecibeDatos_2["id_usuario"] as  $usuarios){
                $ID_Afiliado = $usuarios->ID_Afiliado;
                echo "ID_Afiliado: " . $ID_Afiliado  . "<br>"; 
            } 

            //Se INSERTA el ID_Afiliado en la tabla usuario para almacenar la contraseña.
            $Insercion_2 = $this->Registro_M->insertarClaveUsuario($ID_Afiliado , $ClaveCifrada);
            print_r($Insercion_2);
            
            redirect("/Inicio_C",'refresh'); 
        }
    }
?>    