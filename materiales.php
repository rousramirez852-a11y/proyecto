<?php
include("connection.php");

$con = connection();
$sql = "SELECT * FROM tb_producto";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con Bootstrap</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta de colores */
        body {
            background-color: #556B2F; /* Verde olivo */
        }
        h2 {
            color: #fff; /* Texto blanco sobre fondo verde */
        }
        .btn-primary {
            background-color: #556B2F;
            border: none;
        }
        .btn-primary:hover {
            background-color: #6B8E23;
        }
        .btn-warning {
            background-color: #D8A7A7; /* Palo rosa */
            border: none;
            color: #fff;
        }
        .btn-warning:hover {
            background-color: #c88f8f;
        }
        .btn-danger {
            background-color: #8B0000;
            border: none;
        }
        .btn-danger:hover {
            background-color: #a52a2a;
        }
        .table thead {
            background-color: #556B2F !important;
            color: white;
        }
        .card {
            background-color: #fdfdfd;
            border: 3px solid #D8A7A7;
            border-radius: 12px;
        }
        /* Botón fijo en la esquina inferior izquierda */
        .btn-fixed {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            background-color: #D8A7A7;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
        }
        .btn-fixed:hover {
            background-color: #c88f8f;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Bienvenido</h2>
    <div class="card p-4 shadow">
        <form action="insert.php" method="post" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="client" class="form-control" placeholder="Cliente" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="product_type" class="form-control" placeholder="Tipo de producto" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="product_status" class="form-control" placeholder="Estado del producto" required>
            </div> 
            <div class="col-12 text-center">
                <input type="submit" value="Agregar Producto" class="btn btn-primary px-5">
            </div>
        </form>
    </div>

    <hr class="my-5">

    <h2 class="mb-4 text-center">Productos Registrados</h2>
    <div class="card p-4 shadow">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>TIPO PRODUCTO</th>
                        <th>ESTADO PRODUCTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?=$row['ID_producto']?></td>
                        <td><?=$row['Cliente']?></td>
                        <td><?=$row['Tipo_producto']?></td>
                        <td><?=$row['Estado_producto']?></td>
                        <td>
                            <!-- Botones debajo -->
                            <div class="d-flex flex-column gap-2">
                                <a href="update.php?id=<?=$row['ID_producto']?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="delete.php?id=<?=$row['ID_producto']?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Botón fijo que abre modal -->
<button type="button" class="btn btn-fixed" data-bs-toggle="modal" data-bs-target="#materialesModal">
    Materiales disponibles
</button>

<!-- Modal -->
<div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="materialesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#556B2F; color:white;">
        <h5 class="modal-title" id="materialesModalLabel">Materiales Disponibles</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Aquí puedes mostrar otra tabla o lista de materiales -->
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Material</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tela algodón</td>
                    <td>30 metros</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Botones</td>
                    <td>200 unidades</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cierres</td>
                    <td>50 unidades</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
