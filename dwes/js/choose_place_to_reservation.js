let place_id;
// addEventListener('click', function() {
//     place_id = document.target;
//     console.log(place_id);
// });

// console.log("hola");

document.addEventListener('click', function(event) {
    // event.target es el elemento donde el usuario hizo clic
    let clickedElement = event.target;

    // Verifica si el elemento clicado tiene un id
    if (clickedElement.id) {
        place_id = clickedElement.id;  // Asigna el id del elemento clicado
        console.log("Place ID: " + place_id);  // Imprime el id del elemento
    } else {
        console.log("El elemento clicado no tiene un ID.");
    }
    //Asignamos el ID al formulario
    document.getElementById('input_id').value = place_id;
});

if(!place_id == null) {
   
}