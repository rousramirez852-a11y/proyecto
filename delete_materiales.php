<?php
include("connection.php");

$con = connection();

// Recupera el id que viene por GET
$id = $_GET['id'];

// Ahora sí usa la columna real de tu tabla → ID_producto
$sql = "DELETE FROM tb_materiales WHERE ID_materiales = '$id'";
$elim = mysqli_query($con, $sql);

if ($elim) {
    header("Location: bienvenido.php");
    exit(); // asegura la redirección
} else {
    echo "Error al eliminar: " . mysqli_error($con);
}
?>
