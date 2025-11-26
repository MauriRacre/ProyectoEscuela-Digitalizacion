<?php
include("../config/conexion.php");
$resultado = $conexion->query("SELECT * FROM documentos ORDER BY fecha_subida DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Documentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">📁 Documentos Subidos</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Archivo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['titulo'] ?></td>
                <td><?= $fila['descripcion'] ?></td>
                <td><?= $fila['categoria_id'] ?></td>
                <td><a href="../<?= $fila['archivo_path'] ?>" target="_blank">Ver archivo</a></td>
                <td><?= $fila['fecha_subida'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">✏️</a>
                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Seguro que deseas eliminar este documento?');">🗑️</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="../index.php" class="btn btn-secondary mt-3">⬅️ Subir otro documento</a>
</div>
</body>
</html>
