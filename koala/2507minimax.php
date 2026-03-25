<?php
// Incluir Bootstrap CSS y Font Awesome
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">';

// Incluir JavaScript (opcional para efectos)
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>';

// Función para contar líneas de un archivo
function count_lines($file) {
    if (!file_exists($file)) return 0;
    $lines = file($file);
    return count($lines);
}

// Array de colores alternativos (primary, secondary, success, warning, danger)
$colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-warning', 'bg-danger'];

// Variable para controlar el índice de color
$current_color_index = 0;

// Función para generar mosaicos
function muestra_mosaicos_php($directorio) {
    global $current_color_index;
    
    // Obtener lista de archivos y directorios en el directorio
    $items = scandir($directorio);
    
    // Filtrar solo archivos .php
    $php_files = [];
    foreach ($items as $item) {
        if (file_exists("$directorio/$item") && pathinfo("$directorio/$item", PATHINFO_EXTENSION) === 'php') {
            array_push($php_files, "$directorio/$item");
        }
    }
    
    // Mostrar el índice (primer mosaico)
    echo '<div class="tile bg-white text-dark mb-3">';
    echo '<h5><i class="fas fa-home mr-2"></i> ' . basename($directorio) . '</h5>';
    echo '</div>';
    
    // Mostrar archivos PHP
    foreach ($php_files as $file) {
        // Verificar si es una excepción
        if (in_array(basename($file), ['index.php', 'config.php'])) {
            $color_class = 'bg-dark';
            $icon = '<i class="fas fa-database"></i>';
        } else {
            $color_class = $colors[$current_color_index];
            $current_color_index++;
            if ($current_color_index >= count($colors)) $current_color_index = 0;
            $icon = '<i class="fas fa-file-code"></i>';
        }
        
        // Contar líneas
        $line_count = count_lines($file);
        
        // Crear el mosaico
        echo '<a href="' . escapeshellarg($file) . '" target="_blank" class="tile ' . $color_class . ' mb-3">';
        echo '<div class="text-center p-4">';
        echo $icon;
        echo '</div>';
        echo '<p class="text-white text-center">' . basename($file) . '</p>';
        if ($line_count > 0) {
            echo '<span class="badge bg-light text-dark ml-auto">' . $line_count . ' líneas</span>';
        }
        echo '</a>';
    }
    
    // Mostrar mensaje de modificación (opcional)
    $modification_time = filemtime($directorio);
    if ($modification_time > time() - 72 * 3600) {
        echo '<div class="alert alert-warning mt-4 text-center">';
        echo '⚠️ El directorio ha sido modificado en las últimas 72 horas.';
        echo '</div>';
    }
}

// Mostrar mosaicos para el directorio actual
echo muestra_mosaicos_php(".");
?>
