<?php
    class AcuseDenuncia_M{
        private $db;

        public function __construct(){
            //Se conecta a la BD instanciando la clase Conexion_BD
            $this->db = new Conexion_BD;           
        }
        
        public function consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo, $Estado, $Municipio,$Parroquia){
            $this->db->Consulta("SELECT * FROM fallos WHERE ID_Afiliado = $ID_Afiliado AND (codigoFallo = $CodigoFallo && codigoFallo != 2000) AND ID_Ubicacion = ANY (SELECT ID_Ubicacion FROM ubicacion WHERE  estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia')");
            //ContarRegistros() es un metodo de la clase Conexion_BD
            $gsent = $this->db->ContarRegistros();
            return $gsent;
        }

        public function consultarFecha($ID_Afiliado, $CodigoFallo){
            $this->db->Consulta("SELECT fechaDenuncia, fechaCaducidad, aleatorio FROM fallos WHERE ID_Afiliado = '$ID_Afiliado' AND abierto = 1 AND codigoFallo = $CodigoFallo");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
        
        public function insertarUbicacion($RecibeVarios, $Aleatorio){
            //Se inserta a la BD por medio de sentencias preparadas
            $this->db->Insertar("INSERT INTO ubicacion(estado, municipio, parroquia, direccion, aleatorio) VALUES (:ESTADO, :MUNICIPIO, :PARROQUIA, :DIRECCION, :ALEATORIO_U)");

            //Se vinculan los valores de las sentencias preparadas
            $this->db->bind(':ESTADO' , $RecibeVarios[1]);
            $this->db->bind(':MUNICIPIO' , $RecibeVarios[2]);
            $this->db->bind(':PARROQUIA' , $RecibeVarios[3]);
            $this->db->bind(':DIRECCION' , $RecibeVarios[4]);
            $this->db->bind(':ALEATORIO_U' , $Aleatorio);

            //Se ejecuta la inserción de los datos en la tabla
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }      
        
        public function consultarID_Ubicacion($Aleatorio){
            $this->db->Consulta("SELECT ID_Ubicacion FROM ubicacion WHERE aleatorio = '$Aleatorio'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }

        public function insertarDescripcionDenuncia($Aleatorio, $ID_Afiliado, $ID_Ubicacion, $RecibeVarios, $FechaCaducidad){
            // //Se inserta a la BD por medio de sentencias preparadas
            $this->db->Insertar("INSERT INTO fallos(ID_Ubicacion, ID_Afiliado, aleatorio, sector, servicio, codigoFallo, descripcionFallo, abierto, fechaDenuncia, fechaCaducidad) VALUES (:ID_UBICACION, :ID_AFILIADO, :ALEATORIO, :SECTOR, :SERVICIO, :CODIGO_FALLO, :DESCRIPCION, :ABIERTO, NOW(), :FECHA_CADUCIDAD)");

            $this->db->bind(':ID_UBICACION' , $ID_Ubicacion);
            $this->db->bind(':ID_AFILIADO' , $ID_Afiliado);
            $this->db->bind(':ALEATORIO' , $Aleatorio);
            $this->db->bind(':SECTOR' , $RecibeVarios[5]);
            $this->db->bind(':SERVICIO' , $RecibeVarios[6]);
            $this->db->bind(':CODIGO_FALLO' , $RecibeVarios[0]);
            $this->db->bind(':DESCRIPCION' , $RecibeVarios[7]);
            $this->db->bind(':ABIERTO' , 1);
            $this->db->bind(':FECHA_CADUCIDAD' , $FechaCaducidad);

            //Se ejecuta la inserción de los datos en la tabla
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
            
        }
    }