<?php
    class AcuseDenuncia_C extends CI_Controller{
        public function __construct(){            
            parent::__construct();        
            $this->load->helper('url'); //necesario por site_url() en la vista         
            $this->load->library('session');             
        }

        //En ausencia de metodo cargara este por defecto; es llamado desde detalles_V.php
        public function index(){            
            //Captura todos los campos del formulario, se recibe desde ubicacion_V.php
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["falloAgua"])){//si son enviados por POST y sino estan vacios, entra aqui
                $RecibeVarios = [
                    'Fal' => ucfirst($_POST["falloAgua"]),
                    'DeP' => $_POST["descripcionFallo"]
                ];             
                // print_r($RecibeVarios);  
                echo "<br>";
                $CodigoFallo = $RecibeVarios['Fal']; 

                //Sesion creada en Ubicacion_C.php
                if($this->session->userdata('logueado_2')){
                    $data = array();
                    $data['est'] = $this->session->userdata('Estado');
                    $data['mun'] = $this->session->userdata('Municipio');
                    $data['par'] = $this->session->userdata('Parroquia');
                    $data['dir'] = $this->session->userdata('Direccion');
                    $data['sec'] = $this->session->userdata('Sector');
                    $data['ser'] = $this->session->userdata('Servicio');
                } 
                // print_r($data);
                // echo "<br>";

                $Estado = $data['est']; 
                $Municipio = $data['mun'];  
                $Parroquia = $data['par']; 
                $Direccion = $data['dir'];
                $Sector = $data['sec'];
                $Servicio = $data['ser'];
                
                //Sesion creada en Login_C.php
                if($this->session->userdata('logueado')){
                    $ID_Afil = array();
                    $ID_Afil['id_'] = $this->session->userdata('id');
                } 
                // print_r($ID_Afil);
                // echo "<br>";

                $ID_Afiliado = $ID_Afil['id_']; 
            }
            else{
                echo "Especifique el problema a denunciar";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
                     
            //Se CONSULTA que el usuario no haya realizado la misma denuncia en la misma parroquia un lapso de 20 días
            $this->load->model('AcuseDenuncia_M');
            $usuarios = $this->AcuseDenuncia_M->consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo,  $Estado, $Municipio, $Parroquia);
            // $Mensaje = empty($usuarios) ? "No hay registros en la consulta" : print_r($usuarios);
            // echo $Mensaje . "<br>";
            
            //Sesion solicitada en acuseDenuncia_V.php
            $this->session->set_userdata('ExisteDenuncia', $usuarios);
       
            if(empty($usuarios)){//El usuario no ha realizado la denuncia antes
                // Se genera un aleatorio para insertarlo junto a la ubicacion, por medio de este se relaciona la ubicacion con el servicio denunciado
                mt_srand (time());
                $this->Aleatorio = mt_rand(1000000,999999999);
                // echo "Aleatorio= " . $this->Aleatorio . "<br>";
                
                //Se INSERTAN los datos de ubicacion geografica en la BD
                $Insercion_1 = $this->AcuseDenuncia_M->insertarUbicacion($Estado, $Municipio, $Parroquia,  $Direccion, $this->Aleatorio); 
                // print_r($Insercion_1); 
                // echo "<br>";

                //Se CONSULTA el ID_Ubicacion que se acaba de ingresa en la BD
                $ID_Ubicacion = $this->AcuseDenuncia_M->consultarID_Ubicacion($this->Aleatorio);
                print_r($ID_Ubicacion);
                // echo "<br>";

                $Datos=[
                    "ID_Ubicacion" => $ID_Ubicacion,
                ];    
                
                foreach($Datos["ID_Ubicacion"] as  $usuario){
                    $ID_Ubicacion = $usuario->ID_Ubicacion;
                    // // echo "ID_Ubicacion: " . $ID_Ubicacion  . "<br>"; 
                } 
                // var_dump($Datos['ID_Ubicacion']);

                //Se añaden 20 días a la fecha de la denuncia
                $fecha = date('Y-m-d');
                // echo "Fecha actual: " . $fecha . "<br>";
                $FechaCaducidad = strtotime ('+20 day' , strtotime($fecha)) ;
                $FechaCaducidad = date ('Y-m-j' , $FechaCaducidad);
                // echo "Fecha de caducidad: " . $FechaCaducidad;
                
                // print_r($RecibeVarios); 
                // echo "<br>";
                
                //Se INSERTAN la descripcion de la denuncia, sector publico, servicio, ubicacion, codigo de denuncia y usuario en la BD
                $Insercion_2 = $this->AcuseDenuncia_M->insertarDescripcionDenuncia($this->Aleatorio, $ID_Afiliado, $ID_Ubicacion, $Sector, $Servicio, $RecibeVarios, $FechaCaducidad);
                // print_r($Insercion_2); 
                // echo "<br>";

                //Mediante el objeto load y el método view() de CI_Controller, se cargaran las vistas
                $this->load->view('inc/header_V');
                $this->load->view('paginas/acuseDenuncia_V');
                $this->load->view('inc/footer_V');
            }
            else{//El usuario ya realizo esta denuncia
                //Se CONSULTA la fecha de denuncia, la fecha de caducidad y e código de denuncia
                $Fecha = $this->AcuseDenuncia_M->consultarFecha($ID_Afiliado, $CodigoFallo);
                // print_r($Fecha);
                // echo "<br>";

                $Datos=[
                    "fechas" => $Fecha,
                ];
                
                foreach($Datos["fechas"] as $FechaDevuelta){
                    $Fecha_Ca = $FechaDevuelta->fechaCaducidad;
                    $Fecha_De = $FechaDevuelta->fechaDenuncia;
                    $Codigo = $FechaDevuelta->aleatorio;  
                    // echo "Fecha denuncia: " . $Fecha_De ."<br>";
                    // echo "Fecha caducidad: " . $Fecha_Ca ."<br>";
                } 

                //Se determina el día actual para el calculo de dias restantes
                $FechaActual = date("Y-m-d");
                // echo "Fecha actual: " .  $FechaActual ."<br>";
                //Se calculan la diferencia en dias
                $date1 = new DateTime($FechaActual);
                $date2 = new DateTime($Fecha_Ca);
                $diff = $date1->diff($date2); 
                // print_r($diff); 
                $Dias = $diff->d;
                
                // echo $Dias;
                //Se cambia el formato de la fecha de denuncia, solo para mostar en pantalla
                $Fecha_De = date('d-m-Y', strtotime($Fecha_De));

                $data = array(
                    'Fecha' => $Fecha_De,
                    'Dias' => $Dias,
                    'Codigo' => $Codigo,
                );
                //Mediante el objeto load y el método view() de CI_Controller, se cargaran las vistas
                $this->load->view('inc/header_V');
                $this->load->view('paginas/acuseDenuncia_V', $data);
                $this->load->view('inc/footer_V');
            }
        }
    }
?>   