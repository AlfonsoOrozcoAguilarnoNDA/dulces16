<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Maquetado</title>
    <!-- Bootstrap 4.6.x -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 60px;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .jumbotron {
            background-color: #f8f9fa;
            border-radius: 0;
            margin-bottom: 0;
            padding: 2rem 1rem;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
            border-top: 1px solid #eaeaea;
            padding: 20px 0;
            text-align: center;
        }
        .file-list {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
        .file-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar fija -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.google.com" target="_blank">
                            <i class="fab fa-google"></i> Google
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="opcionesDropdown" role="button" data-toggle="dropdown">
                            Opciones
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Ajustes</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i> Ayuda</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger" href="#">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron con nombre de modelo -->
    <div class="jumbotron">
        <div class="container text-center">
            <h1 class="display-4">Nombre del Modelo</h1>
            <p class="lead">Prueba de maquetado y lógica PHP</p>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3>Archivos del Directorio Actual</h3>
                <div class="file-list card">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <?php
                            // Obtener archivos del directorio actual
                            $directorio = '.';
                            $archivos = array_diff(scandir($directorio), array('..', '.'));
                            
                            foreach ($archivos as $archivo) {
                                $ruta = $directorio . '/' . $archivo;
                                
                                // Verificar si es un archivo (no directorio)
                                if (is_file($ruta)) {
                                    $tamano = filesize($ruta);
                                    $unidad = 'B';
                                    if ($tamano > 1024) {
                                        $tamano /= 1024;
                                        $unidad = 'KB';
                                    }
                                    if ($tamano > 1024) {
                                        $tamano /= 1024;
                                        $unidad = 'MB';
                                    }
                                    
                                    // Determinar icono según tipo de archivo
                                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                                    switch (strtolower($extension)) {
                                        case 'php':
                                            $icono = '<i class="fab fa-php file-icon text-primary"></i>';
                                            break;
                                        case 'html':
                                        case 'htm':
                                            $icono = '<i class="fas fa-code file-icon text-info"></i>';
                                            break;
                                        case 'css':
                                            $icono = '<i class="fab fa-css3-alt file-icon text-success"></i>';
                                            break;
                                        case 'js':
                                            $icono = '<i class="fab fa-js file-icon text-warning"></i>';
                                            break;
                                        default:
                                            $icono = '<i class="fas fa-file-alt file-icon text-secondary"></i>';
                                    }
                                    
                                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                    echo $icono . htmlspecialchars($archivo);
                                    echo '<span class="badge badge-secondary">' . round($tamano, 2) . ' ' . $unidad . '</span>';
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer fijo -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Derechos reservados</span>
        </div>
    </footer>

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
