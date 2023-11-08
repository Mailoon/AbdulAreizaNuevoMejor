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
    <h1>Iniciar sesion</h1>
        <div>
            <i class="fa-regular fa-envelope"></i>
            <input type="text" name="Email" id="Email" class="inputFormularios">
        </div>
        <div>
            <i class="fa-regular fa-user"></i>
            <input type="text" name="nameUsuario" id="nameUsuario" class="inputFormularios">
        </div>
        <div>
            <i class="fa-solid fa-shield-halved"></i>
            <input type="password" name="Password" id="Password" class="inputFormularios">
        </div>
        <div class="g-recaptcha" data-sitekey="6LdmUP4oAAAAAAK4hfsFhtxa1344P_4CfA7FwFWF"></div>
        <div>
            <input type="submit" value="Registrarse">
            <a href="./main.php">Regresar</a>
            <a href="./iniciarSesion.php">Iniciar sesion</a>
        </div>
    </form>
</body>

</html>