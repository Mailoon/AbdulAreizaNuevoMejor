<?php 
require_once '../Models/ConnexionBD.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $removerProductoID = isset($_POST['removerProductoID']) ? $_POST['removerProductoID']: null;
    if($removerProductoID !== null){
        if(isset($_SESSION['carrito'][$removerProductoID])){
            unset($_SESSION['carrito'][$removerProductoID]);
            header('Location: ../Views/productos.php');
        }else{
            echo '<script> alert("El producto no existe")</script>';
        }
    }else{
        'echo <script> alert("No se ha proporcionado un ID de producto válido para eliminar")</script>';
    }
}