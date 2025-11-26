<?php
include __DIR__ . '/../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, rol)
            VALUES ('$usuario', '$contrasena', '$rol')";

    if ($conexion->query($sql)) {
        echo "<script>alert('✅ Usuario registrado con éxito.'); window.location='../views/login.php';</script>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
