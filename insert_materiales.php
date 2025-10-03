<?php
include("connection.php");

$con = connection();

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO tb_materiales (Nombre, Cantidad) VALUES ('$nombre', '$cantidad')";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: bienvenido.php");
    exit();
} else {
    echo "Error al insertar: " . mysqli_error($con);
}
?>
