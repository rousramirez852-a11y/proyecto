<?php
include("connection.php");

$con = connection();

// Recuperar los datos del formulario
$id = $_POST['id'];
$client = $_POST['client'];
$product_type = $_POST['product_type'];
$product_status = $_POST['product_status'];

// Consulta para actualizar
$sql = "UPDATE tb_producto 
        SET Cliente = '$client', 
            Tipo_producto = '$product_type', 
            Estado_producto = '$product_status' 
        WHERE ID_producto = '$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    // Redirigir de vuelta al listado
    header("Location: bienvenido.php");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}
?>

