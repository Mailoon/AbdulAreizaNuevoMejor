<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="../Controllers/"></script>
</head>

<body>
    <?php require_once './navbar.php'; ?>
    <main>
        <?php
        $sql = 'SELECT ID,nameProducto,Img,precio,caracteristicas FROM productos';
        $stmt = mysqli_prepare($conn, $sql);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $ID, $nameProducto, $imagen, $precioProducto, $caracteristicaProduct);
            $productosVista = '';
            while (mysqli_stmt_fetch($stmt)) {
                $productosVista .= '<div class="cardProduct">';
                $productosVista .= '<h3>' . $nameProducto . '</h3>';
                $productosVista .= '<img src="data:image/jpeg;base64,' . base64_encode($imagen) . '" alt="Producto">';
                $productosVista .= '<p>' . $caracteristicaProduct . '</p>';
                $productosVista .= '<button onclick="agregarAlCarrito(' . $ID . ')">Agregar al carrito</button>';
                $productosVista .= "</div>";
            }
            if (!empty($productosVista)) {
                echo $productosVista;
            } else {
                echo 'No hay productos que mostrar.';
            }
        } else {
            echo 'Ha ocurrido un error';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
    </main>
</body>

</html>