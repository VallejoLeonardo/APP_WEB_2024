<?php
session_start(); // Inicia la sesión

// Verificar si el usuario ya inició sesión
if (isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirigir al inicio si ya está autenticado
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
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
            <li><a href="../php/index.php">Inicio</a></li>
            <li><a href="iniciodesesion.php" class="active">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
          
           
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Iniciar Sesión</h1>
            <hr>
            <form action="../php/procesar_login.php" method="POST">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="username" required>
                <br><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>
