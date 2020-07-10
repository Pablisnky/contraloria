function SeleccionarSector(form){
    
    var Estado = form.estado.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio.options;//se captura el elemento select que contiene los municipios
    var Parroquia = form.parroquia.options;//se captura el elemento select que contiene las parroquias
    var Sector = form.sectores.options;//se captura el elemento select que contiene los sectores
    Sector.length = null;

// -----------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------

    if(Estado[23].selected == true){//Yaracuy
        if(Municipio[11].selected == true){//San Felipe
            if(Parroquia[0].selected == true){
                Sector[0] = new Option("");   
            }   
            if(Parroquia[1].selected == true){//Albaríco
                Sector[0] = new Option("");   
                Sector[1] = new Option("Marín");
                Sector[2] = new Option("Albarico");
                Sector[3] = new Option("La Baldosera");
                Sector[4] = new Option("Todos");
            }
            if(Parroquia[2].selected == true){//San Felipe
                Sector[0] = new Option("");   
                Sector[1] = new Option("Zumuco");
                Sector[2] = new Option("Caja de agua");
                Sector[3] = new Option("La asención");
                Sector[4] = new Option("Bella vista");  
                Sector[5] = new Option("Todos");
            }
            if(Parroquia[3].selected == true){//San javier
                Sector[0] = new Option("");   
                Sector[1] = new Option("San Javier"); 
                Sector[3] = new Option("Todos");
            }
        }
    }
}