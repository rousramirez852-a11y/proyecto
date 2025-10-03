<?php
include("connection.php");

$con = connection();

// Consulta productos
$sql = "SELECT * FROM tb_producto";
$query = mysqli_query($con, $sql);

// Consulta materiales
$sql_mat = "SELECT * FROM tb_materiales";
$query_mat = mysqli_query($con, $sql_mat);

// Consulta productos ya registrados (disponibles)
$sql_disponibles = "SELECT * FROM tb_producto";
$query_disponibles = mysqli_query($con, $sql_disponibles);

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
        body {
            background-color: #556B2F; /* Verde olivo */
        }
        h2 {
            color: #fff;
        }
        .btn-primary {
            background-color: #556B2F;
            border: none;
        }
        .btn-primary:hover {
            background-color: #6B8E23;
        }
        .btn-warning {
            background-color: #D8A7A7;
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
        /* Botón login */
        .btn-login {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            border: 2px solid #556B2F;
            color: #556B2F;
            font-weight: bold;
            border-radius: 8px;
            padding: 8px 15px;
        }
        .btn-login:hover {
            background-color: #556B2F;
            color: #fff;
        }

        
    </style>
    
</head>
<body>

<!-- Botón Regresar al Login -->
<a href="login.php" class="btn btn-login">Regresar al Login</a>

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

    <!-- Modal Productos Disponibles -->
<div class="modal fade" id="productosModal" tabindex="-1" aria-labelledby="productosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#556B2F; color:white;">
        <h5 class="modal-title" id="productosModalLabel">Productos Disponibles en la Tienda</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo Producto</th>
                <th>Estado Producto</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($prod_disp = mysqli_fetch_array($query_disponibles)): ?>
              <tr>
                <td><?=$prod_disp['ID_producto']?></td>
                <td><?=$prod_disp['Cliente']?></td>
                <td><?=$prod_disp['Tipo_producto']?></td>
                <td><?=$prod_disp['Estado_producto']?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
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

<!-- Botón fijo que abre modal de productos -->
<button type="button" class="btn btn-fixed" style="right: 20px; left: auto; bottom: 80px;" data-bs-toggle="modal" data-bs-target="#productosModal">
    Productos disponibles
</button>

<button type="button" class="btn-fixed-right productos" data-bs-toggle="modal" data-bs-target="#productosModal">
    <i class="bi bi-bag-check me-2"></i> Productos disponibles
</button>


<!-- Modal Productos -->
<div class="modal fade" id="productosModal" tabindex="-1" aria-labelledby="productosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#556B2F; color:white;">
        <h5 class="modal-title" id="productosModalLabel">Productos Disponibles</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo Producto</th>
                <th>Estado Producto</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Volvemos a ejecutar la consulta de productos
                $query_productos = mysqli_query($con, "SELECT * FROM tb_producto");
                while ($prod = mysqli_fetch_array($query_productos)):
              ?>
              <tr>
                <td><?=$prod['ID_producto']?></td>
                <td><?=$prod['Cliente']?></td>
                <td><?=$prod['Tipo_producto']?></td>
                <td><?=$prod['Estado_producto']?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Materiales -->
<div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="materialesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#556B2F; color:white;">
        <h5 class="modal-title" id="materialesModalLabel">Materiales Disponibles</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        
        <!-- Formulario para agregar materiales -->
        <form action="insert_materiales.php" method="post" class="row g-3 mb-4">
            <div class="col-md-6">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del material" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" required>
            </div>
            <div class="col-md-2 text-center">
                <input type="submit" value="Agregar" class="btn btn-primary w-100">
            </div>
        </form>

        <!-- Tabla de materiales -->
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Material</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($mat = mysqli_fetch_array($query_mat)): ?>
                <tr>
                    <td><?=$mat['ID_materiales']?></td>
                    <td><?=$mat['Nombre']?></td>
                    <td><?=$mat['Cantidad']?></td>
                    <td>
                        <div class="d-flex flex-column gap-2">
                            <a href="update_materiales.php?id=<?=$mat['ID_materiales']?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="delete_materiales.php?id=<?=$mat['ID_materiales']?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>