var http_request = false;
    var peticion= conexionAJAX();
    function conexionAJAX(){
        http_request = false;
        if(window.XMLHttpRequest){ // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType){
                http_request.overrideMimeType('text/xml');
            }
        }
        else if(window.ActiveXObject){ // IE
            try{
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            }
                catch(e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } 
                    catch(e){}
                }
            }
            if(!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	// else{
            //     alert("Instancia creada exitosamente ok");
            // }
            return http_request;
        } 

//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
    function llamar_EstadisticasParroquia(){//Es llamada desde Estadistica_V.php
        document.getElementById('Loading').style.display = 'block';
        let A = document.getElementById("Estado").value;
        let B = document.getElementById("Municipio").value;
        let C = document.getElementById("Parroquia").value;
        let porNombre = document.getElementsByName("frecuencia");
        //Se recorren todos los valores del radio button para encontrar el seleccionado
        for(var i=0; i<porNombre.length; i++){
            if(porNombre[i].checked){
                D= porNombre[i].value;
            }
        }
        var url="estadisticas_C/resultados/" + A + "/" + B + "/" + C + "/" + D;
        http_request.open('GET',url,true); 
        //Cuando XMLHttpRequest cambie de estado, ejecutamos esta funcion    
        peticion.onreadystatechange = respuesta_EstadisticasParroquia;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        // Enviamos los datos con el metodo send
        peticion.send("null");
    }                                                           
    function respuesta_EstadisticasParroquia(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById('Mostrar_Estadisticas').innerHTML=peticion.responseText;
                document.getElementById('Loading').style.display = 'none';
            } 
            else{
                alert('Hubo problemas con la petición.');
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            document.getElementById('Mostrar_evaluar').innerHTML='Cargando registros';
        }
    }
    
//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------

// function llamar_IndicadoresSemanal(){//Es llamada desde Estadistica_Ind_Parro_V.php
//     document.getElementById('Loading').style.display = 'block';
//     var A= document.getElementById("Estado").value;
//     var B= document.getElementById("Municipio").value;
//     var C= document.getElementById("Parroquia").value;
//     var url="estadisticas_C/resultados/" + A + "/" + B + "/" + C ;
//     http_request.open('GET',url,true); 
//     //Cuando XMLHttpRequest cambie de estado, ejecutamos esta funcion    
//     peticion.onreadystatechange = respuesta_IndicadoresSemanal;
//     peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
//     // Enviamos los datos con el metodo send
//     peticion.send("null");
// }                                                           
// function respuesta_IndicadoresSemanal(){
//     if(peticion.readyState == 4){
//         if(peticion.status == 200){
//             document.getElementById('Mostrar_Estadisticas').innerHTML=peticion.responseText;
//             document.getElementById('Loading').style.display = 'none';
//         } 
//         else{
//             alert('Hubo problemas con la petición.');
//         }
//     }
//     else{ //en caso contrario, mostramos un gif simulando una precarga
//         document.getElementById('Mostrar_evaluar').innerHTML='Cargando registros';
//     }
// }