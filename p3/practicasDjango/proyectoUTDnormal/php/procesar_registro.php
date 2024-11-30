<?php
require 'conexion.php'; // Importar el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear contraseña
    $privilegio = 'usuario';

    $sql = "INSERT INTO usuarios (nombre, apellidos, username, password, privilegio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellidos, $username, $password, $privilegio);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado correctamente.'); window.location.href = '../html/iniciodesesion.php';</script>";
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
}
$conexion->close();
?>

