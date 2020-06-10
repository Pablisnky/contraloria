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
            if($_SERVER["REQUEST_METHOD"] == "POST"){//si son enviados por POST, entra aqui
                $RecibeDatos = [
                    'Nombre' => ucfirst($_POST["nombre"]),
                    'Cedula' => ucfirst($_POST["cedula"]),
                    'Telefono' => (int)$_POST["telefono"],
                    'Correo' => strtolower($_POST["correo"]), 
                    'Clave' => $_POST["clave"],
                    'RepiteClave' => $_POST["confirmarClave"],
                ];
            }
            //  print_r($RecibeDatos);
            //  echo "<br>";

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
            redireccionar("/Login_C/");
        }
    }
?>    