function validarRegistro() {
    const Email = document.getElementById("Email").value;
    const NameUsaurio = document.getElementById("nameUsuario").value;
    const Password = document.getElementById("Password").value;
    const validarPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
    const validarEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/
    const response = grecaptcha.getResponse();
    if (Email.trim() === "" || NameUsaurio.trim() === "" || Password.trim() === "") {
        alert('Debes rellenar todos los campos antes');
        return false;
    }
    if (!validarEmail.test(Email)) {
        alert('El correo debe ser valido');
        return false;
    } if (!validarPassword.test(Password)) {
        alert('La contraseña debe contener al menos 8 caracteres, 1 mayuscula, 1 minuscula y un caracter especial');
        return false;
    }
    if (response.length === 0) {
        alert('Debes completar el reCaptcha antes de continuar');
        return false;
    }

    alert('Te has registrado correctamente')
    return true;
}
function validarIniciarSesion() {
    const emailIniciarSesion = document.getElementById("emailIniciarSesion").value;
    const passwordIniciarSesion = document.getElementById("passwordIniciarSesion").value;

    if (emailIniciarSesion.trim() === "" || passwordIniciarSesion.trim() === "") {
        alert('Debes rellenar los campos antes de ingresar');
        return false;
    }
}
function validarIngresoProductos() {
    const imagenSubir = document.getElementById('imagen');
    const nombreProducto = document.getElementById('nombreProducto');
    const precioProducto = document.getElementById('precioProducto');
    const caracteristicaProduct = document.getElementById('caracteristicaProduct');
    const maximoTamañoArchivo = 1024 * 1024;

    if (imagenSubir.files.length === 0) {
        alert("Para continuar, seleccione un archivo.");
        return false;
    }

    let imagenArchivo = imagenSubir.files[0];
    let imagenExtension = imagenArchivo.name.split(".").pop().toLowerCase();

    if (imagenExtension !== "jpg" && imagenExtension !== "jpeg" && imagenExtension !== "png") {
        alert("Seleccione un archivo de imagen válido (jpg, jpeg o png).");
        return false;
    }
    if (imagenArchivo.size > maximoTamañoArchivo) {
        alert("El archivo no puede superar mas de 1MB");
        return false;
    }
    if (nombreProducto.value.trim() === "" || precioProducto.value.trim() === "" || caracteristicaProduct.trim() === "") {
        alert("Para continuar, complete todos los campos.");
        return false;
    }
    return true;
}
