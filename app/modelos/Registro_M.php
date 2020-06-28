<?php
    class Registro_M{
        private $db;

        public function __construct(){
            //Se conecta a la BD instanciando la clase Conexion_BD
            // $this->db = new Conexion_BD;           
        }

        public function insertarUsuario($RecibeDatos){
            //Se inserta a la BD por medio de sentencias preparadas
            $conn = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
            $stmt = $conn->prepare("INSERT INTO afiliado(nombre, cedula, telefono, correo, fecha_afiliacion) VALUES (:Nombre, :Cedula, :Telefono, :Correo, NOW())");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Correo', $correo);

            // insertar una fila
            $nombre = $RecibeDatos['Nombre'];
            $cedula = $RecibeDatos['Cedula'];
            $telefono = $RecibeDatos['Telefono'];
            $correo = $RecibeDatos['Correo'];

            //Se ejecuta la inserción de los datos en la tabla
            $stmt->execute();
        }      

        // public function consultarUsuario($Cedula){         
        //     //Se consulta en la tabla afiliado el ID_Afiliado del afiliado que se esta registrando
        //     $this->db->Consulta("SELECT ID_Afiliado FROM afiliado WHERE cedula ='$Cedula'");

        //     //registros() es un metodo de la clase Conexion_BD
        //     $resultados =  $this->db->registro();
        //     return $resultados;
        // }

        // public function insertarClaveUsuario($Datos, $ClaveCifrada){
        //     $this->db->Insertar("INSERT INTO usuario(ID_Afiliado, clave) VALUES(:ID_Afiliado, '$ClaveCifrada')");

        //     //Se traen los datos obtenidos en la consulta consultarUsuario
        //     foreach($Datos["ID_Afiliado"] as $ID_Afiliado){
        //         $NombreAfiliado = $ID_Afiliado -> ID_Afiliado;
        //         echo "ID_Afiliado: " . $NombreAfiliado  . "<br>"; 
        //     } 

        //     //Se vinculan los valores de las sentencias preparadas
        //     $this->db->bind(':ID_Afiliado' , $ID_Afiliado);
            
        //     //Se ejecuta la inserción de los datos en la tabla
        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }