<?php
include __DIR__ . '/../config/conexion.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conexion->query("DELETE FROM documentos WHERE id=$id");
}

header("Location: ../views/documentos.php");
exit;
?>
