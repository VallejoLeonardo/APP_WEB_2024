<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bd_proyectoutd';

// Crear conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Configuración opcional (asegura el uso de UTF-8)
$conexion->set_charset("utf8");

// Función para reutilizar en casos específicos
function verificar_credenciales($conexion, $username, $password) {
    $sql = "SELECT password FROM usuarios WHERE username = ?";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        die("Error en la consulta: " . $conexion->error);
    }


    return false; // Credenciales incorrectas
}

?>

