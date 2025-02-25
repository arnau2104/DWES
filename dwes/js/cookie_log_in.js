function getCookieJS(name) {
    // Obtener todas las cookies como una cadena
    let cookies = document.cookie;
    
    // Buscar la cookie específica en la cadena
    let cookieArray = cookies.split(';');
    
    // Iterar sobre las cookies
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();
        
        // Si encontramos la cookie que estamos buscando
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1); // Devolver el valor de la cookie
        }
    }
    
    // Si no encontramos la cookie
    return null;
}

document.addEventListener('DOMContentLoaded',()=>{
    let cookie = decodeURIComponent(getCookieJS('067_user_logged'));
    let cookieDecoded = JSON.parse(cookie);
    console.log(cookieDecoded[0],cookieDecoded[1]);
    document.getElementById("username").value =cookieDecoded[0];
    document.log_in_form.password.value = cookieDecoded[1];
    
     if( cookieDecoded[0] && cookieDecoded[1]) {
        console.log("dins click")
        document.log_in_form.submit.click();
     }else {
        console.log("defora click")
     }
})

