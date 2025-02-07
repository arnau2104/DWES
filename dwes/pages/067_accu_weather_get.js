

    let location_key = "305476";
    let request = 'http://dataservice.accuweather.com/currentconditions/v1/305476?apikey=y9YjUYyZu62bklgymt0NecThs5NQvCq2&language=es-es';
    let json;

    let xhttp = new  XMLHttpRequest();
    
    xhttp.onload = function () {  
        json = this.responseText;
        console.log(JSON.parse(json));
       
        let xhttp2 = new XMLHttpRequest();
        let dataToSend = `json=${json}`;
        
        
        xhttp2.onload = function () {
            if (this.status === 200) {
                console.log("Información enviada correctamente");
                console.log(json)
            } else {
                console.log("Error al enviar la información");
            }
            
        }
        xhttp2.onerror = function () {
            console.log("Error en la solicitud POST.");
        };
    
        
        xhttp2.open("POST", './067_db_accu_weather.php',true);
        xhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp2.send(dataToSend)
    }
    xhttp.open("GET", request,true);
    xhttp.send()
   
