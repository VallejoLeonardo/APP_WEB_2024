<?php
session_start(); // Inicia la sesión

// Verificar si el usuario ha iniciado sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
        <li><a href="../php/index.php">Inicio</a></li>
            <?php if ($usuario): ?>
                <!-- Opciones para usuarios autenticados -->
                <li><a href="acercade.php" class="active">Acerca de</a></li>
                <li><a href="../html/mision.php">Misión</a></li>
                <li><a href="../html/vision.php">Visión</a></li>
                <li><a href="../html/articulos.php">Artículos</a></li>
                <li><a href="../html/categorias.php">Categorías</a></li>
                <li><a href="../php/cerrarsesion.php">Cerrar sesión</a></li>
            <?php else: ?>
                <!-- Opciones para visitantes no autenticados -->
                <li><a href="../html/registro.html">Registro</a></li>
                <li><a href="../html/iniciodesesion.html">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Acerca de</h1>
            <hr>
            <p>Bienvenido a la sección Acerca de. Este sitio web está diseñado para demostrar el manejo de PHP y sesiones dinámicas.</p>
            <?php if ($usuario): ?>
                <p>Gracias por estar con nosotros, <strong><?php echo htmlspecialchars($usuario); ?></strong>.</p>
            <?php else: ?>
                <p>Para más detalles, por favor <a href="../html/iniciodesesion.html">inicia sesión</a> o <a href="../html/registro.html">regístrate</a>.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>
