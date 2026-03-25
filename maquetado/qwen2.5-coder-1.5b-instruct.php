<?php
// qwen2.5-coder-1.5b-instruct
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <!-- Cabecera navbar fija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Panel de Control</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" target="_blank">Google</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Ajustes</a>
                            <a class="dropdown-item" href="#">Ayuda</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <h1>Welcome, <?php echo $_SESSION['nombre_modelo']; ?></h1>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar bg-light">
        <a href="#">Perfil</a>
        <a href="#">Ajustes</a>
        <a href="#">Ayuda</a>
    </div>

    <!-- Main content -->
    <main class="container mt-5">
        <h2>Archivos del Directorio Actual</h2>
        <?php
            $files = scandir('.');
            foreach ($files as $file) {
                if (is_file($file)) {
                    echo "<li><a href='$file'>$file</a></li>";
                }
            }
        ?>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center mt-auto">
        <p>&copy; 2023 Panel de Control. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
