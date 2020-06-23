<?php
    class Login_M extends CI_Model{ 

        public function __construct(){
           parent::__construct();
        }
        
        public function consultarAfiliados($Correo){
            $consulta = $this->db->query("SELECT * FROM afiliado WHERE correo='$Correo'"); 
            $resultado = $consulta->result();
            return $resultado;
        }
    
        public function consultarContrasena($ID_Afiliado){
            $Consulta = $this->db->query("SELECT * FROM usuario WHERE ID_Afiliado='$ID_Afiliado'");
            $resultado = $Consulta->result();
            return $resultado;
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