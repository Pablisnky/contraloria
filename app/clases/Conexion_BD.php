<?php
    class Conexion_BD{
        private $Host= DB_HOST;
        private $Usuario= DB_USUARIO;
        private $Password= DB_PASSWORD;
        private $Nombre_base= DB_NOMBRE;

        private $dbh; //database handler
        private $stmt; //statement (ejecutar consulta)
        private $error;

        public function __construct(){
            //Se configura la conexion
            $dsn= "mysql:host=" . $this->Host . ";dbname=" . $this->Nombre_base;
            $Opciones= array(
                            PDO::ATTR_PERSISTENT => true,
                            //Se recuperan los errores que se producen
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING //ERRMODE_EXCEPTION   usar en remoto
                       );
            //Se crea una instancia de PDO
            try{
                //Esta linea es la que hace la conexion a la BD
                $this->dbh= new PDO($dsn, $this->Usuario, $this->Password, $Opciones);
                $this->dbh->exec("set names utf8");
                //Esta linea la añadi, antes no estaba, si la coloco como false se parte el código.
                // $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        //MEtodo pra hacer consultas tipo SELECT
        public function Consulta($sql){
            //se prepara la consulta por medio de prepare() que es un metodo PDO y devuel el objeto mysqli_stmt
            $this->stmt = $this->dbh->prepare($sql);
        }
        
        public function Insertar($sql){
            //se prepara la consulta por medio de prepare() que es un metodo PDO 
            $this->stmt = $this->dbh->prepare($sql);
        }

        public function Elimina($sql){
            //se prepara la consulta por medio de prepare() que es un metodo PDO 
            $this->stmt = $this->dbh->prepare($sql);
        }

        //Se vincula la consulta preparada arriba, devuelve true o false dependiendo si tiene o no tiene exito
        public function bind($Parametro, $Valor, $Tipo=null){
            if(is_null($Tipo)){
                switch(true){
                    case is_int($Valor):
                        $Tipo= PDO::PARAM_INT;
                    break;
                    case is_bool($Valor):
                        $Tipo= PDO::PARAM_BOOL;
                    break;
                    case is_null($Valor):
                        $Tipo= PDO::PARAM_NULL;
                    break;
                    default:
                    $Tipo= PDO::PARAM_STR;
                    break;
                }
            }
            // echo "El parametro es " . $Parametro . " es de tipo " . gettype($Parametro) . "<br>";
            // echo "El valor es: " . $Valor . " es de tipo " . gettype($Valor) .  "<br>";
            // echo "El tipo de de datos es: " . $Tipo . " es de tipo " . gettype($Tipo) .  "<br>";
            // echo "<br>";       
            $this->stmt->bindValue($Parametro, $Valor, $Tipo);
        }
        
        //Se ejecuta la consulta
        public function execute(){
            return $this->stmt->execute();
        }

        //Se obtienen los registros de la consulta
        public function registros(){
            $this->execute();
            return $this->stmt->fetchALL(PDO::FETCH_OBJ);
        }

        //Se obtiene un solo registro de la consulta
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Se obtiene la cantidad de filas de la consulta con el metodo nativo rowCount
        public function ContarRegistros(){
            $this->execute();
            return $this->stmt->rowCount();
        }
    }
?>