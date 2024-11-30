<?php
session_start();
require 'conexion.php'; // Asegúrate de que este archivo se encuentra en la misma carpeta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verificar_credenciales($conexion, $username, $password)) {
        echo "Inicio de sesión exitoso.";
        // Aquí puedes iniciar sesión, redirigir al usuario, etc.
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    // Preparar la consulta para evitar inyecciones SQL
    $query = $conexion->prepare("SELECT * FROM usuarios WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verificar la contraseña (si está encriptada)
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['username'];
            $_SESSION['privilegio'] = $usuario['privilegio'];

            // Redirigir al index.html en la raíz
            header("Location: ../php/index.php");
            exit();
        } else {
            echo "
            Contraseña incorrecta.
            <a href='../html/iniciodesesion.ph'>pVolver</a>
            ";
        }
    } else {
        echo "
        Usuario no encontrado.
        <a href='../html/iniciodesesion.php'>Volver</a>
        ";
    }

    $query->close();
    $conexion->close();
} else {
    // Si se accede al archivo por un método diferente a POST
    echo "
    Error: Método no permitido.
    <a href='../html/iniciodesesion.html'>Volver</a>
    ";
}


