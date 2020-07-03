<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class Login_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        public function consultarAfiliados($Correo){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado WHERE correo = :correo");
            $stmt->bindValue(':correo', $Correo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        }
        
        public function consultarContrasena($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM usuario WHERE ID_Afiliado = :id_afiliado");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }
        
        // public function consultarUsuarioRecordado($Cookie_usuario){
        //     $this->db->Consulta("SELECT * FROM afiliado WHERE ID_Afiliado= '$Cookie_usuario'");
        //     //registros() es un metodo de la clase Conexion_BD
        //     $resultados =  $this->db->registros();
        //     return $resultados;
        // }
        
        // public function insertarCodigoAleatorio($Correo, $Aleatorio){
        //     $this->db->Insertar("INSERT INTO codigo_recuperacion(correo, codigoAleatorio, Fecha_solicitud)VALUES('$Correo','$Aleatorio',NOW())");
            
        //     //Se ejecuta la inserción de los datos en la tabla
        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }       
    }