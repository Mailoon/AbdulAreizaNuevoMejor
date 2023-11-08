<?php require_once '../Models/ConnexionBD.php';
session_start();
?>
<script src="https://kit.fontawesome.com/e0348cbc34.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../Controllers/Navbar.css">
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
    </div>
    <?php
    if ($_SESSION) {
        echo '<ul>' . $_SESSION["nameUsuario"] . '</ul>';
        if ($_SESSION['nameUsuario'] === 'admin') {
            if ($url !== 'ingresarProdcutos.php') {
                echo '<a href="./ingresarProductos.php"><ul>Publicar productos</ul></a>';
            }
        }
        echo '<i class="fa-solid fa-cart-shopping"></i>';
        echo '<a href="../Models/cerrarSesion.php"><ul>Cerrar sesion</ul></a>';
    } else {
        echo '<div>';
        echo '<a href="./registrarse.php"><ul>Registrarse</ul></a>';
        echo '<a href="./iniciarSesion.php"><ul>Inicair sesion</ul></a>';
        echo '</div>';
    }
    ?>
</nav>