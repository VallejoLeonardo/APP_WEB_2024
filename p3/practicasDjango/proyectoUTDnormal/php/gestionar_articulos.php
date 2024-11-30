<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];

    $query = $conexion->prepare("INSERT INTO articulos (descripcion, pu, cantidad, id_categoria) VALUES (?, ?, ?, ?)");
    $query->bind_param("sdii", $descripcion, $precio, $cantidad, $categoria);

    if ($query->execute()) {
        header("Location: ../php/articulos.php?success=1"); // Redirige al listado con éxito
    } else {
        echo "<p>Error al registrar el artículo: " . $conexion->error . "</p>";
        echo "<p><a href='../php/articulos.php'>Volver</a></p>";
    }

    $query->close();
    $conexion->close();
}
?>
