<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar productos</title>
    <script src="../Controllers/validacionFormularios.js" defer></script>
</head>

<body>
    <?php require_once './navbar.php'; ?>
    <form action="../Models/insertarProductos.php" method="post" onsubmit="return validarIngresoProductos()" enctype="multipart/form-data">
        <div class="formDiv">
            <label for="nombreProducto">Nombre del producto</label>
            <input type="text" id="nombreProducto" name="nombreProducto">
        </div>
        <div class="formDiv">
            <label for="imagen">Subir imagen</label>
            <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">
        </div>
        <div class="formDiv">
            <label for="precioProducto">Precio</label>
            <input type="number" id="precioProducto" name="precioProducto">
        </div>
        <div class="formDiv">
            <label for="caracteristicaProduct">Caracteristicas del producto</label>
            <input type="text" id="caracteristicaProduct" name="caracteristicaProduct">
        </div>
        <div>
            <input type="submit" value="Registrar producto">
        </div>
    </form>
</body>

</html>