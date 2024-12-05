document.addEventListener('DOMContentLoaded', () => {
    // Selecciona todos los elementos <li> que tienen submenús
    const menuItemsWithSubmenus = document.querySelectorAll('nav ul li');

    menuItemsWithSubmenus.forEach(item => {
        const submenu = item.querySelector('ul'); // Encuentra el submenú del elemento actual

        if (submenu) {
            // Agrega un evento de clic al elemento con submenú
            item.addEventListener('click', (event) => {
                event.stopPropagation(); // Evita que los clics se propaguen al padre
                submenu.classList.toggle('hidden'); // Alterna la clase 'hidden' para mostrar/ocultar
            });

            // Agrega una clase "cursor-pointer" para indicar que es interactivo
            item.classList.add('cursor-pointer');
        }
    });

    // Cierra todos los submenús si se hace clic fuera de ellos
    document.addEventListener('click', () => {
        menuItemsWithSubmenus.forEach(item => {
            const submenu = item.querySelector('ul');
            if (submenu) {
                submenu.classList.add('hidden'); // Oculta el submenú
            }
        });
    });
});
