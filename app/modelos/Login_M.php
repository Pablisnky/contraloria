<?php
    class Login_M{
        private $db;

        public function __construct(){
            //Se conecta a la BD instanciando la clase Conexion_BD
            $this->db = new Conexion_BD;
        }

        public function consultarAfiliados($Correo){
            $this->db->Consulta("SELECT * FROM afiliado WHERE correo='$Correo'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
        
        public function consultarContrasena($ID_Afiliado){
            $this->db->Consulta("SELECT * FROM usuario WHERE ID_Afiliado='$ID_Afiliado'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
        
        public function consultarUsuarioRecordado($Cookie_usuario){
            $this->db->Consulta("SELECT * FROM afiliado WHERE ID_Afiliado= '$Cookie_usuario'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
        public function insertarCodigoAleatorio($Correo, $Aleatorio){
            $this->db->Insertar("INSERT INTO codigo_recuperacion(correo, codigoAleatorio, Fecha_solicitud)VALUES('$Correo','$Aleatorio',NOW())");
            
            //Se ejecuta la inserción de los datos en la tabla
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }       
    }