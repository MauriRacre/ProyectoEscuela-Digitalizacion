<?php
session_start();
include __DIR__ . '/../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $id_usuario = $_SESSION['id_usuario'];

    $nombreArchivo = basename($_FILES["archivo"]["name"]);
    $rutaDestino = "../documentos/" . $nombreArchivo;
    $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));

    // Validar y mover el archivo
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaDestino)) {
        $sql = "INSERT INTO documentos (titulo, descripcion, archivo_path, tipo_archivo, categoria_id, id_usuario)
                VALUES ('$titulo', '$descripcion', '$nombreArchivo', '$tipoArchivo', '$categoria', '$id_usuario')";

        if ($conexion->query($sql)) {
            echo "<script>alert('✅ Archivo subido correctamente'); window.location='../views/documentos.php';</script>";
        } else {
            echo "Error al guardar en la base de datos: " . $conexion->error;
        }
    } else {
        echo "<script>alert('❌ Error al subir el archivo'); window.location='../views/subir.php';</script>";
    }
}
?>
