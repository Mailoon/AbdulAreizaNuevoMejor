document.addEventListener('DOMContentLoaded', () => {
    function actualizarCantidad(productID, incremento) {
        var cantidadInput = document.getElementById('cantidad' + productID);
        var nuevaCantidad = parseInt(cantidadInput.value) + incremento;
    
        if (nuevaCantidad >= 0) {
            cantidadInput.value = nuevaCantidad;
            // Aquí puedes agregar lógica adicional si es necesario
        } else {
            alert("La cantidad no puede ser negativa.");
        }
    }

    //######################################################################
    const carrito = document.querySelector('.carrito');
    const iconCarrito = document.getElementById('iconCarrito');

    iconCarrito.addEventListener('click', () => {
        carrito.classList.toggle('mostrarCarrito');
        carrito.classList.toggle('hidden');
    });

    //######################################################################
    const cerrarSesion = document.getElementById('cerrarSesion');

    cerrarSesion.addEventListener('click', () => {
        let mensajeSalir = window.confirm('¿Estas seguro que deseas cerrar sesion?');
        if (mensajeSalir) {
            alert('Sesion cerrada con exito')
            window.location.href = "../Models/cerrarSesion.php";
        }
    });

    //##########################################################################
    function carritoAgregar() {
        const botonCarritoAdd = document.querySelectorAll('.botonCarritoAdd');
        botonCarritoAdd.addEventListener('click', ()=>{
            alert('Producto Agregado con exito')
        });
    };
});