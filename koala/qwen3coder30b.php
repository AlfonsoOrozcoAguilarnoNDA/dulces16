<?php
// Archivo: qwen3coder30b.php

// Función para mostrar mosaicos de auditoría dinámica
function muestra_mosaicos_php($directorio) {
    // Array de excepciones
    $excepciones = ['index.php', 'config.php'];
    
    // Verificar si el directorio existe
    if (!is_dir($directorio)) {
        return "<p class='text-danger'>Directorio no válido: $directorio</p>";
    }

    // Abrir el directorio
    $dh = opendir($directorio);
    if (!$dh) {
        return "<p class='text-danger'>No se puede abrir el directorio: $directorio</p>";
    }

    // Obtener todos los archivos .php
    $archivos = [];
    while (($file = readdir($dh)) !== false) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            $archivos[] = $file;
        }
    }
    closedir($dh);

    // Ordenar archivos
    sort($archivos);

    // Iniciar la salida HTML
    $output = "<div class='row'>";

    // Mosaico del directorio actual (blanco)
    $nombre_directorio = basename(realpath($directorio));
    if ($directorio === '.') {
        $nombre_directorio = 'Raíz';
    } elseif ($directorio === '..') {
        $nombre_directorio = 'Padre';
    }
    
    $output .= "
        <div class='col-6 col-md-3 col-lg-2 mb-3'>
            <div class='card text-center bg-white border-0 shadow-sm h-100' style='height: 120px;'>
                <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                    <i class='fas fa-folder fa-2x text-dark mb-2'></i>
                    <h6 class='card-title text-dark mb-0'>$nombre_directorio</h6>
                </div>
            </div>
        </div>";

    // Mosaicos de archivos PHP
    $colores = ['primary', 'secondary', 'success', 'warning', 'danger'];
    $color_index = 0;

    foreach ($archivos as $file) {
        $ruta_completa = "$directorio/$file";
        
        // Determinar color y icono según excepción
        if (in_array($file, $excepciones)) {
            $bg_color = 'dark';
            $icono = 'fas fa-database';
        } else {
            $bg_color = $colores[$color_index % count($colores)];
            $icono = 'fab fa-php';
            $color_index++;
        }

        // Contar líneas del archivo
        $lineas = 0;
        if (file_exists($ruta_completa)) {
            $lineas = count(file($ruta_completa));
        }

        // Fecha de modificación
        $fecha_mod = filemtime($ruta_completa);
        $x = 72; // Horas máximas para advertencia
        $diferencia_horas = (time() - $fecha_mod) / 3600;
        $alerta = ($diferencia_horas > $x) ? '<span class="badge bg-danger">¡Antiguo!</span>' : '';

        // Enlace al archivo en nueva ventana
        $enlace = htmlspecialchars($ruta_completa);
        
        $output .= "
            <div class='col-6 col-md-3 col-lg-2 mb-3'>
                <a href='$enlace' target='_blank' class='text-decoration-none'>
                    <div class='card text-center bg-$bg_color border-0 shadow-sm h-100 text-white'>
                        <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                            <i class='$icono fa-2x mb-2'></i>
                            <h6 class='card-title mb-0'>" . basename($file) . "</h6>
                            <span class='badge bg-light text-dark mt-1'>$lineas líneas</span>
                            $alerta
                        </div>
                    </div>
                </a>
            </div>";
    }

    $output .= "</div>";
    return $output;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Koala - Auditoría Dinámica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Barra de navegación superior fija -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-robot"></i> Koala
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Auditoría</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reportes</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container-fluid mt-5 pt-4 flex-grow-1">
    <h2>Auditoría de Archivos PHP</h2>
    
    <!-- Mosaicos del directorio actual -->
    <div class='mt-4'>
        <h4>Directorio Actual:</h4>
        <?php echo muestra_mosaicos_php("."); ?>
    </div>

    <!-- Mosaicos del directorio padre -->
    <div class='mt-5'>
        <h4>Directorio Padre:</h4>
        <?php echo muestra_mosaicos_php(".."); ?>
    </div>
</div>

<!-- Footer fijo -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
        <p class="mb-0">&copy; 2025 Koala - Sistema de Auditoría Dinámica</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
