<?php
include("connection.php");

$con = connection();

// Aquí el parámetro debe coincidir con tu tabla → ID_producto
$id = $_GET['id'];

$sql = "SELECT * FROM tb_producto WHERE ID_producto ='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Bootstrap CSS 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Producto</h2>
    
    <div class="card shadow p-4 mb-5">
        <form action="edit_crud.php" method="post">

            <!-- ID oculto para enviar a edit_crud -->
            <input type="hidden" name="id" value="<?= $row['ID_producto'] ?>">

            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="client" class="form-control" 
                        placeholder="Cliente" value="<?= $row['Cliente'] ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="product_type" class="form-control" 
                        placeholder="Tipo de producto" value="<?= $row['Tipo_producto'] ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="product_status" class="form-control" 
                        placeholder="Estado del producto" value="<?= $row['Estado_producto'] ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>
    </div>
</div>

</body>
</html>
