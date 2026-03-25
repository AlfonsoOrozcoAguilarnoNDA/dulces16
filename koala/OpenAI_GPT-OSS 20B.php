<?php
/* mosaicosgptoss20b.php
 * ---------------------------------
 * Mosaicos dinámicos para auditoría de archivos PHP.
 * 
 * Requisitos:
 *  - Navegación superior y footer fijos (Bootstrap 4.6)
 *  - Función `muestra_mosaicos_php($directorio)` que genera la rejilla.
 *  - Iconos Font Awesome 5.x
 *  - Colores según especificaciones.
 *  - Badge con número de líneas del archivo.
 *  - Aviso si el archivo se modificó en las últimas $x = 72 horas.
 *
 * Autor: [Tu nombre]
 * Fecha: <?php echo date('Y-m-d'); ?>
 */

require_once __DIR__ . '/vendor/autoload.php'; // Si usas Composer para Font Awesome

// -----------------------------
// CONFIGURACIÓN
// -----------------------------
$excepciones = ['index.php', 'config.php'];
$coloresAlternar = ['primary', 'secondary', 'success', 'warning', 'danger'];
$x_horas = 72;

// CSS personalizado (puedes moverlo a un archivo .css)
echo <<<CSS
<style>
/* Navegación y footer fijos */
.fixed-top, .fixed-bottom { background:#f8f9fa; }
.card-mosaico {
    height:200px;
    display:flex;
    flex-direction:column;
}
.card-body {
    flex-grow:1;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:3rem;
}
.card-footer {
    text-align:center;
    padding:.5rem .75rem;
}
</style>
CSS;

// -----------------------------
// FUNCIONES
// -----------------------------
/**
 * Devuelve el nombre del archivo con su extensión.
 */
function getFileName(string $path): string {
    return basename($path);
}

/**
 * Calcula la cantidad de líneas en un archivo.
 */
function lineCount(string $filePath): int {
    if (!is_readable($filePath)) return 0;
    return count(file($filePath, FILE_IGNORE_NEW_LINES));
}

/**
 * Devuelve el tiempo transcurrido desde la última modificación del archivo
 * en horas. Si > $x_horas devuelve true.
 */
function modifiedInLastHours(string $filePath, int $x): bool {
    if (!file_exists($filePath)) return false;
    $modTime = filemtime($filePath);
    return (time() - $modTime) <= ($x * 3600);
}

/**
 * Genera la rejilla de mosaicos para un directorio dado.
 *
 * @param string $directorio Directorio a explorar
 * @return string HTML generado
 */
function muestra_mosaicos_php(string $directorio): string {
    global $excepciones, $coloresAlternar;

    // Escape y normalizar ruta
    $dir = rtrim($directorio, DIRECTORY_SEPARATOR);
    if (!is_dir($dir)) return '<div class="alert alert-danger">Directorio no encontrado.</div>';

    // Comienzo del contenedor
    $html = '<div class="container-fluid py-3"><div class="row justify-content-center">';

    // ---------- Mosaico del directorio ----------
    $nombreDir = basename($dir) ?: 'Raíz';
    $iconoDir   = ($directorio === '..') ? 'fa-home' : 'fa-folder-open'; // Ejemplo
    $html .= <<<HTML
<div class="col-6 col-md-3 col-lg-2 mb-4">
  <div class="card card-mosaico bg-white text-dark shadow-sm">
    <div class="card-body d-flex justify-content-center align-items-center">
      <i class="fas {$iconoDir}"></i>
    </div>
    <div class="card-footer font-weight-bold">{$nombreDir}</div>
  </div>
</div>
HTML;

    // ---------- Mosaicos de archivos ----------
    $files = scandir($dir);
    sort($files); // Orden alfabético
    $colorIndex = 0; // Para alternar colores

    foreach ($files as $file) {
        if (in_array(strtolower($file), ['.', '..'])) continue;
        if (!is_file("$dir/$file")) continue; // Solo archivos

        // Sólo PHP
        if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'php') continue;

        $fullPath = "$dir/$file";
        $nombreArchivo = getFileName($fullPath);
        $lineas = lineCount($fullPath);

        // Determinar color e icono
        if (in_array($nombreArchivo, $excepciones)) {
            $bgColor   = 'bg-dark text-white';
            $icono     = 'fa-database'; // Icono de base de datos
        } else {
            $colorKey  = $coloresAlternar[$colorIndex % count($coloresAlternar)];
            $bgColor   = "bg-{$colorKey} text-white";
            $icono     = 'fa-file-code';
            $colorIndex++;
        }

        // Aviso de modificación reciente
        $aviso = '';
        if (modifiedInLastHours($fullPath, 72)) {
            $aviso = '<span class="badge badge-light">Modificado < 72h</span>';
        }

        $html .= <<<HTML
<div class="col-6 col-md-3 col-lg-2 mb-4">
  <a href="{$fullPath}" target="_blank" class="text-decoration-none">
    <div class="card card-mosaico {$bgColor} shadow-sm">
      <div class="card-body d-flex justify-content-center align-items-center">
        <i class="fas {$icono}"></i>
      </div>
      <div class="card-footer font-weight-bold">
          {$nombreArchivo}
          <br><span class="badge badge-light">{$lineas} líneas</span> {$aviso}
      </div>
    </div>
  </a>
</div>
HTML;
    }

    // Cierre del contenedor
    $html .= '</div></div>';

    return $html;
}

// -----------------------------
// EJECUCIÓN (ejemplo)
// -----------------------------
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Mosaicos de Auditoría PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<!-- Navegación superior fija -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
  <a class="navbar-brand" href="#">Koala Auditoría</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <!-- Puedes añadir más enlaces -->
    </ul>
  </div>
</nav>

<!-- Contenido principal -->
<main role="main" style="padding-top:70px;">
  <?php
  echo muestra_mosaicos_php(".");
  echo muestra_mosaicos_php("..");
  ?>
</main>

<!-- Footer fijo -->
<footer class="footer fixed-bottom py-2">
  <div class="container text-center">
    <span class="text-muted">© <?= date('Y') ?> Koala. Todos los derechos reservados.</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
