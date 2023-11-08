<?php
require_once './ConnexionBD.php';
$Email = $_POST['Email'];
$Name = $_POST['nameUsuario'];
$Password = $_POST['Password'];
$passwordHased = password_hash($Password,PASSWORD_ARGON2ID);

$sql = "INSERT INTO usuarios (Name,Email,Password) value (?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $Name, $Email, $passwordHased);
if (mysqli_stmt_execute($stmt)) {
    echo '<script> alert("Te has registrado con exito.")</script>';
    session_start();
    $_SESSION['nameUsuario'] = $Name;
    $_SESSION['Email'] = $Email;
    header('Location: ../Views/Main.php');
} else {
    echo '<script> alert("Ha ocurrido un error") </script>';
    header('Location: ../Views/registrarse.php');
}
mysqli_stmt_close($stmt);
