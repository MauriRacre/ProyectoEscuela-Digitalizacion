<?php
include __DIR__ . '/../config/conexion.php';

// Crear estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['apellido'])) {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);

    $sql = "INSERT INTO estudiantes (nombre, apellido) VALUES ('$nombre', '$apellido')";
    if ($conexion->query($sql)) {
        echo "<script>alert('✅ Estudiante registrado correctamente'); window.location='../views/estudiantes.php';</script>";
    } else {
        echo "Error al registrar estudiante: " . $conexion->error;
    }
    exit;
}

// Eliminar estudiante
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    $conexion->query("DELETE FROM estudiantes WHERE id=$id");
    header("Location: ../views/estudiantes.php");
    exit;
}
?>
