<?php
include("connection.php");

$con = connection();

// Recuperar los datos del formulario
$client = $_POST['client'];
$product_type = $_POST['product_type'];
$product_status = $_POST['product_status'];

// Insertar en la tabla
$sql = "INSERT INTO tb_producto (Cliente, Tipo_producto, Estado_producto) 
        VALUES ('$client', '$product_type', '$product_status')";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: bienvenido.php");
    exit();
} else {
    echo "Error al insertar: " . mysqli_error($con);
}
?>
