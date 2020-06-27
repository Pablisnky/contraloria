<?php
    //Vista cargada desde Estadisticas_V/resultados
    //se verifica si la ruta a la carpeta "system" esta definida, Constante creada en index.php
    defined('BASEPATH') OR exit('No direct script access allowed');

    foreach($consulta->result() as $Fila){
        echo $Fila->sector;
    }
    echo "Carga la vista";
?>