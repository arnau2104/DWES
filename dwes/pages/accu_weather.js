

    let location_key = "305476";
    const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
    let request = 'http://dataservice.accuweather.com/currentconditions/v1/305476?apikey=y9YjUYyZu62bklgymt0NecThs5NQvCq2&language=es-es'
    let json;

    let xhttp = new  XMLHttpRequest();
    xhttp.onload = function () {  
        json = this.responseText;
        console.log(JSON.parse(json));
    }
    xhttp.open("GET", request,true);
    xhttp.send()
   


    // fetch('http://dataservice.accuweather.com/currentconditions/v1/305476?apikey=y9YjUYyZu62bklgymt0NecThs5NQvCq2&language=es-es')
    // .then(response => response.json())
    // .then(json => console.log(json))
    // .catch(error => console.error('Error:', error));
