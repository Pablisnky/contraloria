<?php
    class Entrada_M{
        private $db;

        public function __construct(){
            echo "Se conecta a la BD" . "<br>";
            $this->db = new Conexion_BD;
        }
    }