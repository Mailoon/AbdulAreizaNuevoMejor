<?php
require_once './ConnexionBD.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombreProducto = $_POST['nombreProducto'];
    $imagen = $_FILES['imagen'];
    $imagenNombre = $imagen['name'] ;
    $imagenBytes = file_get_contents($imagen['tmp_name']);
    $precioProducto = $_POST['precioProducto'];
    $caracteristicaProduct = $_POST['caracteristicaProduct'];

    $sql = 'INSERT INTO productos (nameProducto,Img,precio,caracteristicas) value (?,?,?,?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,'ssss',$nombreProducto,$imagenBytes,$precioProducto,$caracteristicaProduct);
    if(mysqli_stmt_execute($stmt)){
       echo '<script> alert("Productos registrados con exito")</script>';
       header('Location: ../Views/ingresarProductos.php');
    }else{
       echo '<script>alert("Error al registrar producto")</script>';
       echo 'El archivo es demasiado grande o ha ocurrido un error';
    }
}