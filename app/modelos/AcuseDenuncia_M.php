<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class AcuseDenuncia_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo, $Estado, $Municipio, $Parroquia){
            $stmt = $this->dbh->prepare("SELECT * FROM fallos WHERE ID_Afiliado = :id_afiliado AND (codigoFallo = :codigo_fallo && :codigo_fallo != 2000) AND ID_Ubicacion = ANY (SELECT ID_Ubicacion FROM ubicacion WHERE  estado = :estado AND municipio = :municipio AND parroquia = :parroquia)");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->bindValue(':codigo_fallo', $CodigoFallo, PDO::PARAM_INT);
            $stmt->bindValue(':estado', $Estado, PDO::PARAM_STR);
            $stmt->bindValue(':municipio', $Municipio, PDO::PARAM_STR);
            $stmt->bindValue(':parroquia', $Parroquia, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function consultarFecha($ID_Afiliado, $CodigoFallo){
            $stmt = $this->dbh->prepare("SELECT fechaDenuncia, fechaCaducidad, aleatorio FROM fallos WHERE ID_Afiliado = :id_afiliado AND abierto = 1 AND codigoFallo = :codigoFallo");
            $stmt->bindValue(':codigoFallo', $CodigoFallo, PDO::PARAM_INT);
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }
        
        public function insertarUbicacion($RecibeVarios, $Aleatorio){    
            $stmt = $this->dbh->prepare("INSERT INTO ubicacion(estado, municipio, parroquia, direccion, aleatorio) VALUES (:ESTADO, :MUNICIPIO, :PARROQUIA, :DIRECCION, :ALEATORIO_U)");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ESTADO', $estado);
            $stmt->bindParam(':MUNICIPIO', $municipio);
            $stmt->bindParam(':PARROQUIA', $parroquia);
            $stmt->bindParam(':DIRECCION', $direccion);
            $stmt->bindParam(':ALEATORIO_U', $aleatorio_u);
            
            $estado = $RecibeVarios[1];
            $municipio = $RecibeVarios[2];
            $parroquia = $RecibeVarios[3];
            $direccion = $RecibeVarios[4];
            $aleatorio_u = $Aleatorio;
                        
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }      
        
        public function consultarID_Ubicacion($Aleatorio){
            $stmt = $this->dbh->prepare("SELECT ID_Ubicacion FROM ubicacion WHERE aleatorio = :aleatorio");
            $stmt->bindValue(':aleatorio', $Aleatorio, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public function insertarDescripcionDenuncia($Aleatorio, $ID_Afiliado, $ID_Ubicacion, $RecibeVarios, $FechaCaducidad){      
            $stmt = $this->dbh->prepare("INSERT INTO fallos(ID_Ubicacion, ID_Afiliado, aleatorio, sector, servicio, codigoFallo, descripcionFallo, abierto, fechaDenuncia, fechaCaducidad) VALUES (:ID_UBICACION, :ID_AFILIADO, :ALEATORIO, :SECTOR, :SERVICIO, :CODIGO_FALLO, :DESCRIPCION, :ABIERTO, NOW(), :FECHA_CADUCIDAD)");

            $stmt->bindParam(':ID_UBICACION', $id_ubicacion);
            $stmt->bindParam(':ID_AFILIADO', $id_afiliado);
            $stmt->bindParam(':ALEATORIO', $aleatorio);
            $stmt->bindParam(':SECTOR', $sector);
            $stmt->bindParam(':SERVICIO', $servicio);
            $stmt->bindParam(':CODIGO_FALLO', $codigo_fallo);
            $stmt->bindParam(':DESCRIPCION', $descripcion);
            $stmt->bindParam(':ABIERTO', $abierto);
            $stmt->bindParam(':FECHA_CADUCIDAD', $fecha_caducidad);

            $id_ubicacion = $ID_Ubicacion;
            $id_afiliado = $ID_Afiliado;
            $aleatorio = $Aleatorio;
            $sector = $RecibeVarios[5];
            $servicio = $RecibeVarios[6];
            $codigo_fallo = $RecibeVarios[0];
            $descripcion = $RecibeVarios[7];
            $abierto = 1;
            $fecha_caducidad = $FechaCaducidad;

            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }