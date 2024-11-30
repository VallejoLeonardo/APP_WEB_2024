<?php
include 'conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = trim($_POST['descripcion']);

    if (!empty($descripcion)) {
        // Insertar la nueva categoría en la base de datos
        $query = $conexion->prepare("INSERT INTO categorias (descripcion) VALUES (?)");
        $query->bind_param("s", $descripcion);

        if ($query->execute()) {
            echo "<p>Categoría agregada exitosamente. <a href='../html/categorias.php'>Volver</a></p>";
        } else {
            echo "<p>Error al agregar la categoría: " . $conexion->error . "</p>";
        }

        $query->close();
    } else {
        echo "<p>La descripción no puede estar vacía. <a href='../html/categorias.php'>Volver</a></p>";
    }

    $conexion->close();
} else {
    header("Location: ../html/categorias.php");
    exit;
}
