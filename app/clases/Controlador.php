<?php
// Se diseña el contolador principal, se encarga de cargar los modelos y las vistas
class Controlador{
    
    //Carga el modelo
    public function modelo($modelo){
        // echo "se trae el archivo que cntiene la clase recibida por parametro y se procede a instanciarla $modelo . "<br>";
        require_once("../app/modelos/" . $modelo . ".php");
        // Se instancia la clase respectiva que pide la información necesaria a la BD
        return new $modelo();
    }
    
    //Carga la vista, el parametro $vista lo recibe desde cada controlador que mande a cargar una vista
    public function vista($vista, $Datos=[]){
        // se chequea si el archivo vista existe
        if(file_exists("../app/vistas/" . $vista . ".php")){
            require_once("../app/vistas/" . $vista . ".php");
        }
        else{
            die("La vista no existe");
        }
    }
       //Carga la vista ubicada en una un subdirectorio, el parametro $vista lo recibe desde cada controlador que mande a cargar una vista
       public function vista_falloPorServicio($vista, $Datos=[]){
        // se chequea si el archivo vista existe
        if(file_exists("../app/vistas/" . $vista . ".php")){
            require_once("../app/vistas/" . $vista . ".php");
        }                   
        else{
            die("La vista en el sub-directorio no existe");
        }
    }
}