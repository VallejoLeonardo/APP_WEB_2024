<?php
session_start(); 
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <script>
        // Si es un error 404, mostramos la alerta y luego redirigimos
        window.onload = function() {
            <?php if ($is_404): ?>
                alert("¡Lo siento! La página que buscas no existe. Serás redirigido a la página principal.");
                setTimeout(function() {
                    window.location.href = "/proyectoUTDnormal/php/index.php"; 
                }, 3000); 
            <?php else: ?>
                window.location.href = "/proyectoUTDnormal/php/index.php";
            <?php endif; ?>
        };
    </script>

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
            <li><a href="index.php">Inicio</a></li>
            <?php if ($usuario): ?>
                <!-- Opciones para usuarios autenticados -->
                <li><a href="../html/acercade.php">Acerca de</a></li>
                <li><a href="../html/mision.php">Misión</a></li>
                <li><a href="../html/vision.php">Visión</a></li>
                <li><a href="../html/articulos.php">Artículos</a></li>
                <li><a href="../html/categorias.php">Categorías</a></li>
                <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
            <?php else: ?>
                <!-- Opciones para visitantes no autenticados -->
                <li><a href="../html/iniciodesesion.php">Iniciar Sesion</a></li>
                <li><a href="../html/registro.php">Registro</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Inicio</h1>
            <hr>
            <?php if ($usuario): ?>
            <p>Bienvenido a la página de inicio</p> <br><hr>
            <p>Bienvenido al sistema, <strong><?php echo htmlspecialchars($usuario); ?></strong>.</p>

            <?php else: ?>
                <p>Bienvenido a nuestro sitio web.
                <hr>
                <h1 style="font-size: 25px">Por favor inicie sesión</h1><br>
                <a href="../html/iniciodesesion.php">Inicia sesión</a><br> <a href="../html/registro.php">Regístrate</a>.</p>
                
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>
<?php
session_start(); 

include '../php/conexion.php';

// Obtener el nombre del usuario de la sesión
$nombreUsuario = $_SESSION['usuario']['nombre'] ?? 'invitado'; // Usamos 'invitado' si no hay nombre en la sesión

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Logo PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../php/index.php" class="active">Inicio</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="../php/cerrarsesion.php">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="../html/registro.php">Registro</a></li>
                <li><a href="../html/iniciodesesion.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Inicio</h1>
            <hr>
            <p>Bienvenido a la página de inicio</p> <br>
            <p>Bienvenido al sistema</p>
            <p>Usuario: <?php echo $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></p>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>
