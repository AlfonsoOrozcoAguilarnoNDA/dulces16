<?php session_start(); if ($_SESSION['horas'] > 72) { echo '<div class="alert alert-warning" role="alert"> Warning: The time spent on the project has exceeded the planned hours (72).</div>'; } ?> <!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Granite - Mosaicos de Auditoria Dinamica</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX0e+hQeCwWrybtwKeTx49deycuzc1uxi0Fp1uWYg+lA6QsY4gF4" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6Iaoq7NMjOHQTSOKiop0s93t3+uZQBpysdVleK2bDngCaMbM7ipXhoOXHYKUQQFvy2+vLATboGD9kqc"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Custom CSS -->
<style>
    .mosaic {
        height: 150px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        font-size: 24px;
    }

    .mosaic.bg-white { background-color: white; }
    .mosaic.bg-dark { background-color: #333; }
    .mosaic.primary { background-color: #007bff; }
    .badge-lines { background-color: rgba(255, 255, 255, 0.8); color: black; border-radius: 16px; padding: 3px 8px; }
</style>
</head> <body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-home"></i>&nbsp; Directory
        </a>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">

    <?php

    function muestra_mosaicos_php($directorio) {
        $excepciones = ['index.php', 'config.php'];

        echo '<div class="row">';
        $handle = opendir($directorio);
        while (($file = readdir($handle)) !== false) {
            if (is_dir("$directorio/$file")) {
                echo '<div class="col-6 col-md-3 col-lg-2 mosaico bg-white text-dark">';
                echo '<i class="fas fa-folder"></i>';
                echo '<span>' . htmlspecialchars($file) . '</span>';
                echo '</div>';
            } elseif (is_file("$directorio/$file") && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $color = match(true) {
                    in_array($file, $excepciones) => 'bg-dark',
                    default => ['primary', 'secondary', 'success', 'warning', 'danger'][count(file($directorio . '/' . $file)) % 5],
                };

                echo '<div class="col-6 col-md-3 col-lg-2 mosaico bg-' . $color . '">';
                echo '<i class="fas fa-database"></i>';
                echo '<span>' . htmlspecialchars($file) . '</span>';
                echo '<span class="badge badge-lines">' . count(file($directorio . '/' . $file)) . '</span>';

                echo '<div style="cursor: pointer;" data-target="_blank" onclick="location.href=\'';
                echo htmlspecialchars($directorio . '/' . $file);
                echo '\';"></div>';

                echo '</div>';
            }
        }
        closedir($handle);
        echo '</div>';
    }

    muestra_mosaicos_php('.');
    ?>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 Granite - Auditoria de Archivos Móvil y Escritorio</p>
</footer>

<!-- Bootstrap JS & Dependencias (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPu/z+p+/nLVM8mE0X5eisvH7i7M52g=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHLPt1bJY0gLvJu6r97kuHQCFL7ugAiraBSIm/6CPn+7ZlH25"
    crossorigin="anonymous"></script>
</body> </html>
