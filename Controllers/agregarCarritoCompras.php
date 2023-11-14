<?php
require_once '../Models/ConnexionBD.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = isset($_POST['productID']) ? $_POST['productID'] : null;

    if ($productID !== null) {
        $sql = "SELECT ID, nameProducto, img, precio FROM productos WHERE ID = $productID";
        $result = mysqli_query($conn, $sql);

        if (isset($_SESSION['nameUsuario'])) {
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $producto = mysqli_fetch_assoc($result);
                    if (!isset($_SESSION['carrito'])) {
                        $_SESSION['carrito'] = array();
                    }
                    if (array_key_exists($productID, $_SESSION['carrito'])) {
                        $_SESSION['carrito'][$productID]['cantidad']++;
                    } else {
                        $_SESSION['carrito'][$productID] = array(
                            'nombre' => $producto['nameProducto'],
                            'precio' => $producto['precio'],
                            'imagen' => $producto['img'],
                            'cantidad' => 1
                        );
                    }
                    header('Location: ../Views/productos.php');
                } else {
                    echo 'No se encontró ningún producto con ese ID.';
                }

                mysqli_free_result($result);
            } else {
                echo 'Error en la consulta: ' . mysqli_error($conn);
            }
        } else {
            header('Location: ../Views/registrarse.php');
        }
    } else {
        echo 'No se ha proporcionado un ID de producto válido.';
    }
} else {
    echo 'La solicitud no es de tipo POST.';
}
?>
