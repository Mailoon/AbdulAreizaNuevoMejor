<?php 

$conn = new mysqli('localhost', 'root','','abudulareiza');
if($conn->connect_error){
    die("Ocurrio un error: " . $conn->error);
}
