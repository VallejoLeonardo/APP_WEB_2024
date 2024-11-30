<?php
session_start();

include '../php/conexion.php'; 

// Consulta para obtener las categorías, la cantidad de artículos en cada una y la fecha de creación
$query = "
    SELECT c.id, c.descripcion, COUNT(a.id) AS cantidad_articulos, c.fecha_creacion
    FROM categorias c
    LEFT JOIN articulos a ON c.id = a.id_categoria
    GROUP BY c.id, c.descripcion
";
$resultado = $conexion->query($query);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorías | PHP Proyecto UTD</title>
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
            <li><a href="../php/index.php">Inicio</a></li>
            
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="categorias.php" class="active">Categorías</a></li>
          
                <li><a href="../php/cerrarsesion.php" >Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="../html/registro.html">Registro</a></li>
                <li><a href="../html/iniciodesesion.html">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1 style="font-size: 35px">Categorías</h1>
            <hr>
            <label style="display: block; text-align: center; padding: 10px; font-size: 35px;">Listado</label>
            <hr>
            <div class="category-list">
            <?php if (isset($_SESSION['usuario'])): ?>
                <?php while ($categoria = $resultado->fetch_assoc()): ?>
                <div class="category-item">
                    <h3><?php echo htmlspecialchars($categoria['descripcion']); ?></h3>
                    <p>Cantidad de Artículos: <?php echo $categoria['cantidad_articulos']; ?></p>
                    <p class="date"><?php 
                        // Formatear la fecha si es diferente de null
                        if ($categoria['fecha_creacion']) {
                            $fecha = new DateTime($categoria['fecha_creacion']);
                            echo $fecha->format('d \d\e F \d\e Y \a \l\a\s H:i'); 
                        } else {
                            echo "Sin fecha";
                        }
                    ?></p>
                </div>
                <hr>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Para gestionar las categorías, por favor <a href="../html/iniciodesesion.html">inicia sesión</a>.</p>
            <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>