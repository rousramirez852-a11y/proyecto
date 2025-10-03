<?php

function connection() {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "login";

    $conn = mysqli_connect($servidor, $usuario, $clave, $bd);

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $conn;
}
?>