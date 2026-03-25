<?php
//google/gemma-3-4b
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha384-j+Cuhriptylineq9iX1c7wU5FmGmmrP2NlWz5eQkH4R5yKqJtB+5vV9f66w" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- Navbar Fija -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">Tu Nombre Modelo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Ajustes</a>
                            <a class="dropdown-item" href="#">Ayuda</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.google.com" target="_blank">Google</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron con Nombre -->
    <div class="jumbotron text-center mt-5" style="background-color: #f8f9fa;">
        <h1>Bienvenido, Tu Nombre Modelo</h1>
        <p>Este es un panel de control básico.</p>
    </div>

    <!-- Área Central - Lista de Archivos -->
    <div class="container">
        <h2>Archivos del Directorio</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Tamaño</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Obtener la lista de archivos en el directorio actual
                $archivos = scandir("."); // "." representa el directorio actual

                if ($archivos === false) {
                    echo "Error al leer los archivos del directorio.";
                    exit;
                }

                foreach ($archivos as $archivo) {
                    // Excluir directorios y el propio script PHP
                    if ($archivo != "." && $archivo != "..") {
                        $ruta_completa = __FILE__ . "/" . $archivo; // Asegura que la ruta sea relativa al script
                        $tamaño = filesize($ruta_completa);

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($archivo) . "</td>";  // Escapa para seguridad
                        echo "<td>" . round($tamaño, 2) . " bytes</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer Fijo -->
    <div class="sticky-footer bg-success text-white">
        <p>&copy; 2023 Derechos Reservados</p>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha384-LrQnfji9iUTwgE7K1qT3S6BlLSOv5fDmCpHMfXjrk+bJ+gO1HXxzXt9DEU2xXzD" crossorigin="anonymous"></script>
</body>

</html>
