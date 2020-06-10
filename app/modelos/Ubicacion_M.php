<?php
    class Ubicacion_M{
        private $db;

        public function __construct(){
            // Se conecta a la BD
            $this->db = new Conexion_BD;
        }
    }