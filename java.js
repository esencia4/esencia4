document.addEventListener('DOMContentLoaded', () => {
    const botonesAgregar = document.querySelectorAll('.btn-agregar');
    const carritoItems = document.getElementById('carrito-items');
    const botonesLike = document.querySelectorAll('.btn-like');
    const carrito = [];

    // Función para manejar "Agregar al Carrito"
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', () => {
            const producto = boton.closest('.producto');
            const nombre = producto.querySelector('h3').innerText;
            const precioTexto = producto.querySelector('p').innerText;
            const precio = parseFloat(precioTexto.replace('$', ''));

            carrito.push({ nombre, precio });
            actualizarCarrito();
        });
    });

    // Función para manejar "Me gusta"
    botonesLike.forEach(boton => {
        boton.addEventListener('click', () => {
            boton.classList.toggle('liked');
            boton.textContent = boton.classList.contains('liked') ? '💖' : '👍';
        });
    });

    // Actualiza la sección de carrito
    function actualizarCarrito() {
        carritoItems.innerHTML = '';
        carrito.forEach(item => {
            const div = document.createElement('div');
            div.className = 'item-carrito';
            div.innerHTML = `<p>${item.nombre} - $${item.precio.toFixed(2)}</p>`;
            carritoItems.appendChild(div);
        });
    }
});
