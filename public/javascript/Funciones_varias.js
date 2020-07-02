//Muestra el textarea donde se escribe el numero de cedula en detalles_V.php
    // function ModalIdentificacion(){ 
    //     var A= document.getElementById('Contenedor_2');
    //     A.style.display = "block";               
    // }

    // ModalIdentificacion = ()=>{ 
    //     var A= document.getElementById('Contenedor_2');
    //     A.style.display = "block";            
    // }

    // subirPantalla = ()=>{
    //     window.scrollTo(0, 500);
    // }

    // document.getElementById("DescribeFallo").addEventListener("click", ActivaTextarea);
    // function ActivaTextarea(){
    //     document.getElementById("Textarea_1").style.display = "block";
    // }
    
    function DesactivarTextarea(){
        var resultado = "ninguno";
        var porNombre= document.getElementsByName("falloAgua");
        // Recorremos todos los valores del radio button para encontrar el seleccionado
        for(var i=0;i<porNombre.length;i++){
            if(porNombre[i].checked){
                resultado= porNombre[i].value;
                if(resultado != "2000"){
                    document.getElementById("Textarea_1").style.display = "none";
                }
                else{
                    document.getElementById("Textarea_1").style.display = "block";
                }
            }   
        }
        // document.getElementById("Resultado").innerHTML = " \Por Nombre: " + resultado;
    }

// **********************************************************************************************
// **********************************************************************************************

// Hace parpadear el nombre del usuario en el header
var nw = 0;
function animacion(){  
    var intervalo = setInterval(function(){
        nw += 1;
        document.getElementById('Contenedor_4').classList.toggle('fade');
        if(nw == 6){
            clearInterval(intervalo);
        }
    }, 400);
}

// **********************************************************************************************
// **********************************************************************************************
//Llamada desde estadistica_V
function mostrarFrecuencia(){
    document.getElementById("Contenedor_7").style.display = "grid";
}

// **********************************************************************************************
// **********************************************************************************************


// **********************************************************************************************
// **********************************************************************************************