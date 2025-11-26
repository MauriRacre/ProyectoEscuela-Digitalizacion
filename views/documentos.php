<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/conexion.php';

$rol = $_SESSION['rol'];
$id_usuario = $_SESSION['id_usuario'];

// Si es admin, ve todos; si no, solo los suyos
$sql = ($rol === 'admin')
    ? "SELECT * FROM documentos"
    : "SELECT * FROM documentos WHERE id_usuario = $id_usuario";

$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Documentos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h2>📂 Lista de Documentos</h2>

    <table border="1" style="margin:auto; border-collapse: collapse;">
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Archivo</th>
            <th>Fecha</th>
            <th>Acción</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?= $fila['titulo'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td><a href="../documentos/<?= $fila['archivo_path'] ?>" download>📥 Descargar</a></td>
            <td><?= $fila['fecha_subida'] ?></td>
            <td>
                <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">✏️ Editar </a>
                <a href="../controllers/eliminarDocumento.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar documento?')">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="panel.php">⬅️ Volver al panel</a>
</body>
</html>
