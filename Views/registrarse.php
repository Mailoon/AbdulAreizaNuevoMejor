<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../Controllers/Formularios.css">
    <script src="https://kit.fontawesome.com/e0348cbc34.js" crossorigin="anonymous"></script>
    <script src="../Controllers/validacionFormularios.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <form action="../Models/insertarUsuarios.php" method="post" onsubmit="return validarRegistro()">
    <h1>Registrarse</h1>
        <div>
            <i class="fa-regular fa-envelope"></i>
            <input type="text" name="Email" id="Email" placeholder="Correo" class="inputFormularios">
        </div>
        <div>
            <i class="fa-regular fa-user"></i>
            <input type="text" name="nameUsuario" id="nameUsuario" placeholder="Nombre de usuario" class="inputFormularios">
        </div>
        <div>
            <i class="fa-solid fa-shield-halved"></i>
            <input type="password" name="Password" id="Password" placeholder="Contraseña" class="inputFormularios">
        </div>
        <div class="g-recaptcha" data-sitekey="6LdmUP4oAAAAAAK4hfsFhtxa1344P_4CfA7FwFWF"></div>
        <div class="botonesFooter">
            <input type="submit" value="Registrarse" class="btn iniciar">
            <a href="./main.php" class="btn StilosNone regresar">Regresar</a>
            <a href="./iniciarSesion.php" class="btn StilosNone backgroundNaraja">Iniciar sesion</a>
        </div>
    </form>
</body>

</html>