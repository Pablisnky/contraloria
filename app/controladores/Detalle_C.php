<?php    
    class Detalle_C extends Controlador{
        
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, es llamado desde Ubicacion_C/recibeUbicacion
        public function index($RecibeDatos){       
            // print_r($RecibeDatos); 
            // echo "<br>";
            // $RecibeDatos se convierte en un array() nuevamente para obtener el ultimo elemento de la cadena
            $RecibeDatos_array = explode(",", $RecibeDatos);    
            // print_r($RecibeDatos_array); 
            // echo "<br>";
            switch($RecibeDatos_array[5]){
                case "aguapotable": 
                    //$RecibeDatos se vuelve a convertir en un string
                    $RecibeDatos_string = implode(",", $RecibeDatos_array);
                    $Datos = $RecibeDatos_string;
                    // Se carga la vista en este mismo metodo, "ojo" no redirecciona
                    $this->vista("paginas/fallosPorServicios/fallos_aguaPotable_V", $Datos);
                break;
                case "aguaservida": 
                    //$RecibeDatos se vuelve a convertir en un string
                    $RecibeDatos_string = implode(",", $RecibeDatos_array);  
                    $Datos = $RecibeDatos_string;
                    // Se carga la vista en este mismo metodo, "ojo" no redirecciona
                    $this->vista("paginas/fallosPorServicios/fallos_aguaServida_V", $Datos);
                break;
            }      
        }
    }
?>    