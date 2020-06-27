<?php
    class Registro_M extends CI_Model{ 

        public function __construct(){
           parent::__construct();
        }

        public function insertarUsuario($RecibeDatos){
            //Se inserta a la BD por medio de sentencias preparadas
            $conn = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
            $stmt = $conn->prepare("INSERT INTO afiliado(nombre, cedula, telefono, correo, fecha_afiliacion) VALUES (:NOMBRE, :CEDULA, :TELEFONO, :CORREO, NOW())");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':NOMBRE', $nombre);
            $stmt->bindParam(':CEDULA', $cedula);
            $stmt->bindParam(':TELEFONO', $telefono);
            $stmt->bindParam(':CORREO', $correo);

            $nombre = $RecibeDatos['Nombre'];
            $cedula = $RecibeDatos['Cedula'];
            $telefono = $RecibeDatos['Telefono'];
            $correo = $RecibeDatos['Correo'];
            
            $stmt->execute();        
        }      

        public function consultarUsuario($Cedula){         
            //Se consulta en la tabla afiliado el ID_Afiliado del afiliado que se esta registrando
            $consulta = $this->db->query("SELECT ID_Afiliado FROM afiliado WHERE cedula ='$Cedula'");
            $resultado = $consulta->result();
            return $resultado;
        }

        public function insertarClaveUsuario($Datos, $ClaveCifrada){
            $conn = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
            $stmt = $conn->prepare("INSERT INTO usuario(ID_Afiliado, clave) VALUES(:ID_Afiliado, '$ClaveCifrada')");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_Afiliado', $id_afiliado);

            //Se vinculan los valores de las sentencias preparadas
            $id_afiliado = $Datos;
            
            $stmt->execute();  
        }
    }