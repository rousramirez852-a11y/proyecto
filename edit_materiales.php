<?php
include("connection.php");
$con = connection();

$id = $_POST['ID_materiales'];
$nombre = $_POST['Nombre'];
$cantidad = $_POST['Cantidad'];

$sql = "UPDATE tb_materiales SET Nombre='$nombre', Cantidad='$cantidad' WHERE ID_materiales='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: bienvenido.php");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}
?>
