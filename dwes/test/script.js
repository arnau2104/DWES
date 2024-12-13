  // Seleccionamos el campo de búsqueda y los elementos de la lista
  const searchBox = document.getElementById('searchBox');
  const items = document.querySelectorAll('#items li');

  // Escuchamos el evento de entrada en el campo de búsqueda
  searchBox.addEventListener('input', () => {
    const searchTerm = searchBox.value.toLowerCase(); // Obtenemos el texto ingresado, convertido a minúsculas

    // Recorremos cada elemento de la lista
    items.forEach(item => {
      // Si el texto del elemento incluye el término de búsqueda, lo mostramos; si no, lo ocultamos
      if (item.textContent.toLowerCase().includes(searchTerm)) {
        item.style.display = ''; // Mostrar el elemento
      } else {
        item.style.display = 'none'; // Ocultar el elemento
      }
    });
  });