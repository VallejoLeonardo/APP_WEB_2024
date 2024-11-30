<?php
session_start();

include '../php/conexion.php'; 

// Consulta para obtener los artículos, sus categorías, la ruta de la imagen y la fecha de creación, ordenados por ID descendente
$query = "
    SELECT a.id, a.descripcion AS articulo, a.pu, a.cantidad, c.descripcion AS categoria, a.imagen_ruta, a.fecha_creacion
    FROM articulos a
    INNER JOIN categorias c ON a.id_categoria = c.id
    ORDER BY a.id DESC  
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
    <title>Artículos | PHP Proyecto UTD</title>
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
                <li><a href="articulos.php" class="active">Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="../php/cerrarsesion.php" >Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="../html/registro.html">Registro</a></li>
                <li><a href="../html/iniciodesesion.html">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
        <h1 style="font-size: 35px">Artículos</h1>
            <hr>
            <hr>
            <label style="display: block; text-align: center; padding: 10px; font-size: 35px;">Listado</label>
            <hr>
            <div class="article-list">
            <?php if (isset($_SESSION['usuario'])): ?>
                <?php while ($articulo = $resultado->fetch_assoc()): ?>
                <div class="article-item">
                    <div class="article-header">
                        <?php if ($articulo['imagen_ruta']): ?>
                            <img src="<?php echo $articulo['imagen_ruta']; ?>" alt="Imagen del artículo">
                        <?php else: ?>
                            <img src="../img/logophp.png" alt="Imagen por defecto">
                        <?php endif; ?>
                        <h2><?php echo htmlspecialchars($articulo['articulo']); ?></h2>
                    </div>
                    <p><?php echo htmlspecialchars($articulo['articulo']); ?></p>
                    <p>Categoría: <?php echo htmlspecialchars($articulo['categoria']); ?></p>
                    <p>Precio Unitario: <?php echo htmlspecialchars($articulo['pu']); ?></p>
                    <p><p class="date"><?php 
                        // Formatear la fecha si es diferente de null
                        if ($articulo['fecha_creacion']) {
                            $fecha = new DateTime($articulo['fecha_creacion']);
                            echo $fecha->format('d \d\e F \d\e Y \a \l\a\s H:i'); 
                        } else {
                            echo "Sin fecha";
                        }
                    ?></p>
                    <hr>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Para gestionar los artículos, por favor <a href="../html/iniciodesesion.php">inicia sesión</a>.</p>
            <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>