<?php
require_once '../Models/ConnexionBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = $_POST['emailIniciarSesion'];
    $Password = $_POST['passwordIniciarSesion'];

    $sql = "SELECT Name, Email, Password FROM usuarios WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $Name, $Email, $passwordHash);
        mysqli_stmt_fetch($stmt);

        if (password_verify($Password, $passwordHash)) {
            session_start();
            $_SESSION['nameUsuario'] = $Name;
            $_SESSION['Email'] = $Email;
            header('Location: ../Views/main.php');
        } else {
            $error_message = "Credenciales incorrectas";
        }
    } else {
        $error_message = "Credenciales incorrectas";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://kit.fontawesome.com/e0348cbc34.js" crossorigin="anonymous"></script>
    <script src="../Controllers/validacionFormularios.js"></script>
</head>

<body>
    <form method="post" onsubmit="return validarIniciarSesion()">
    <h1>Iniciar sesion</h1>
        <div>
            <i class="fa-regular fa-envelope"></i>
            <input type="text" name="emailIniciarSesion" id="emailIniciarSesion">
        </div>
        <div>
            <i class="fa-solid fa-shield-halved"></i>
            <input type="password" name="passwordIniciarSesion" id="passwordIniciarSesion">
        </div>
        <div>
            <input type="submit" value="Iniciar sesion">
            <a href="./main.php">Regresar</a>
            <a href="./registrarse.php">Registrarse</a>
        </div>
    </form>
    <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</body>

</html>