<?php
session_start();
include __DIR__ . '/../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['usuario'] = $row['nombre_usuario'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: ../views/panel.php");
            exit;
        } else {
            echo "<script>alert('❌ Contraseña incorrecta'); window.location='../views/login.php';</script>";
        }
    } else {
        echo "<script>alert('⚠️ Usuario no encontrado'); window.location='../views/login.php';</script>";
    }
}
?>
