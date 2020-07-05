<?php
    class Conexion_BD{
        private $Host= DB_HOST;
        private $Usuario= DB_USUARIO;
        private $Password= DB_PASSWORD;
        private $Nombre_base= DB_NOMBRE;

        public $dbh; //database handler
        private $error;

        public function __construct(){
            //Se configura la conexion
            $dsn= "mysql:host=" . $this->Host . ";dbname=" . $this->Nombre_base;
            $Opciones= array(
                            PDO::ATTR_PERSISTENT => true,
                            //Se recuperan los errores que se producen
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING //ERRMODE_EXCEPTION   usar en remoto
                       );
            try{
                //Se crea un objeto PDO, Esta linea es la que hace la conexion a la BD
                $this->dbh = new PDO($dsn, $this->Usuario, $this->Password, $Opciones);
                // $this->dbh = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
                $this->dbh->exec("set names utf8");
                //Esta linea la añadi, antes no estaba, si la coloco como false se parte el código.
                // $this->Conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
    }    
?>