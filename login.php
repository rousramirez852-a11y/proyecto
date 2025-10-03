<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Puntada Digital - Login</title>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    /* Paleta de colores */
    :root {
        --verde-olivo: #556b2f;
        --verde-claro: #6b8e23;
        --rosa-palo: #fbecec;
        --rosa-bordes: #e6b8b8;
        --blanco-suave: #fffafa;
    }

    /* Fondo degradado elegante */
    body {
        background: linear-gradient(135deg, var(--rosa-palo), #ffe4e1);
        font-family: 'Segoe UI', sans-serif;
        height: 100vh;
    }

    /* Contenedor con animación */
    .form-container {
        background-color: var(--blanco-suave);
        border: 1px solid var(--rosa-bordes);
        border-radius: 20px;
        padding: 40px 30px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        transform: translateY(-50px);
        opacity: 0;
        animation: fadeInUp 1s forwards;
    }

    @keyframes fadeInUp {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Título elegante */
    .titulo {
        color: var(--verde-olivo);
        font-weight: 700;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }

    /* Inputs con íconos */
    .input-group-text {
        background-color: var(--rosa-palo);
        border: 1px solid var(--rosa-bordes);
        border-radius: 10px 0 0 10px;
        color: var(--verde-olivo);
    }

    .form-control {
        border-radius: 0 10px 10px 0;
        border: 1px solid var(--rosa-bordes);
        padding: 10px 15px;
    }

    .form-control:focus {
        border-color: var(--verde-olivo);
        box-shadow: 0 0 5px rgba(85,107,47,0.3);
    }

    /* Botón principal */
    .btn-olivo {
        background-color: var(--verde-olivo);
        color: white;
        font-weight: bold;
        border-radius: 10px;
        padding: 12px;
        transition: all 0.3s;
    }
    .btn-olivo:hover {
        background-color: var(--verde-claro);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    /* Imagen lateral */
    .imagen-lateral {
        background: url('descargar (2).jpg') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        border-radius: 0 20px 20px 0;
    }

    @media (max-width: 768px){
        .imagen-lateral {
            display: none;
        }
    }

    /* Mensaje pequeño */
    .small-text {
        font-size: 0.85rem;
        color: #888;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Imagen lateral -->
        <div class="col-md-6 imagen-lateral d-none d-md-block"></div>

        <!-- Formulario -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="form-container text-center">
                <h2 class="titulo">Puntada Digital</h2>
                <form action="validar.php" method="POST">
                    <!-- Usuario con icono -->
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                    </div>
                    <!-- Contraseña con icono -->
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" value="Ingresar" class="btn btn-olivo w-100">
                </form>
                <p class="small-text">Inicio de sesión.</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>