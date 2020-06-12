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
                if(resultado != "DescribeFallo"){
                    document.getElementById("Textarea_1").style.display = "none";
                }
                else{
                    document.getElementById("Textarea_1").style.display = "block";
                }
            }   
        }
        // document.getElementById("Resultado").innerHTML = " \Por Nombre: " + resultado;
    }