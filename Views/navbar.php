<?php require_once '../Models/ConnexionBD.php';
session_start();
?>
<script src="https://kit.fontawesome.com/e0348cbc34.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../Controllers/Navbar.css">
<script src="../Controllers/Carrito.js" defer></script>
<nav>
    <div>
        <a href="./main.php"><img src="../Container/Logo.png" alt=""></a>
        <?php
        $url = basename($_SERVER['PHP_SELF']);
        if ($url !== 'main.php') {
            echo '<a href="./main.php"><ul>Home</ul></a>';
        }
        if ($url !== 'productos.php') {
            echo '<a href="./productos.php"><ul>Productos</ul></a>';
        }
        ?>

        <?php
        if ($_SESSION) {
            if ($_SESSION['nameUsuario'] === 'admin') {
                if ($url !== 'ingresarProductos.php') {
                    echo '<a href="./ingresarProductos.php"><ul>Publicar productos</ul></a>';
                }
            }
            echo '</div>';
            echo '<div>';
            echo '<ul>'."@" . $_SESSION["nameUsuario"] . '</ul>';
            echo '<i class="fa-solid fa-cart-shopping" id="iconCarrito"></i>';
            echo '<div class="carrito hidden">';
            if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                $total = 0;
                echo '<article class="carritoVer">';
                foreach ($_SESSION['carrito'] as $productID  => $producto) {
                    echo '<div class="seccionProductos">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($producto['imagen']) . '" alt="Producto">';
                    echo '<p id="precio' . $productID . '">Precio: $' . $producto['precio'] . '</p>';
                    echo '<section class="cantidad-container">';
                    echo '<h3 id="cantidad" value="" onchange="actualizarCantidad(' . $productID . ', 0)">'.$producto['cantidad'].'</h3>';
                    echo '</section>';
                    echo '<form method="post" action="../Controllers/eliminarCarrito.php">';
                    echo '<input type="hidden" name="removerProductoID" value="' . $productID . '">';
                    echo '<button type="submit"class="Eliminar">Eliminar</button>';
                    echo '</form>';
                    echo '</div>';
                    $total += $producto['precio'] * $producto['cantidad'];
                }
                echo '</article>';
                echo '<div class="Contianer-total">';
                echo'<p class="total">Total: $'.$total.'</p>';
                echo '</div>';
            }else{
                echo 'El carrito de compras está vacío';
            }
            echo '</div>';
            echo '<a href="#" id="cerrarSesion"><ul>Cerrar sesión</ul></a>';
            echo '</div>';
        } else {
            echo '</div>';
            echo '<div>';
            echo '<a href="./registrarse.php"><ul>Registrarse</ul></a>';
            echo '<a href="./iniciarSesion.php"><ul>Iniciar sesión</ul></a>';
            echo '</div>';
        }

        ?>
</nav>
