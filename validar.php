<?php 

include("connection.php");
$conn = connection();

$usuario = $_POST['usuario'];
$clave   = $_POST['contrasenia'];

// Corrige la consulta SQL con los nombres correctos de tus columnas
$sql = "SELECT * FROM tb_login WHERE nombre = '$usuario' AND contrasenia = '$clave'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: bienvenido.php");
    exit();
} else {
    echo "USUARIO Y CONTRASEÑA INCORRECTOS";
}
?>
