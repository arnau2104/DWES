//let place_id_input = document.getElementById('place_id_input');
let take_id_button = document.querySelectorAll(".take_id_button"); 
let divChoosePlace = document.querySelectorAll(".choose-place")
let  place_id;
// addEventListener('click', function() {
//     place_id = document.target;
//     console.log(place_id);
// });



// take_id_button.addEventListener('click', function(event) {
//     // event.target es el elemento donde el usuario hizo clic
//     let clickedElement = event.target;

//     // Verifica si el elemento clicado tiene un id
//     if (clickedElement.id) {
//         place_id = clickedElement.id;  // Asigna el id del elemento clicado
//         console.log("Place ID: " + place_id);  // Imprime el id del elemento
//     } else {
//         console.log("El elemento clicado no tiene un ID.");
//     }
//     //Asignamos el ID al formulario
//     place_id_input.value = place_id;
//     console.log(place_id_input);
// });
take_id_buttons.forEach(button => {
    button.addEventListener('click', function(event) {
        // Obtener el ID del botón que fue clickeado
        let place_id = event.target.id;

        console.log("Place ID: " + place_id);  // Imprime el ID del lugar

        // Asignar el valor de place_id al campo oculto
        document.getElementById('place_id_input').value = place_id;

        console.log("Valor de input de lugar: " + document.getElementById('place_id_input').value);  // Verifica el valor del input
    });
});

console.log("funciona");
