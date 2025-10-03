<?php
include("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_materiales WHERE ID_materiales='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materiales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Editar Materiales</h2>
        <form action="edit_materiales.php" method="POST" class="row g-3">
            <input type="hidden" name="ID_materiales" value="<?=$row['ID_materiales']?>">

            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="<?=$row['Nombre']?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Cantidad</label>
                <input type="number" name="Cantidad" class="form-control" value="<?=$row['Cantidad']?>" required>
            </div>
            <div class="col-12 text-center">
                <input type="submit" value="Actualizar" class="btn btn-primary px-4">
                <a href="bienvenido.php" class="btn btn-secondary px-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
