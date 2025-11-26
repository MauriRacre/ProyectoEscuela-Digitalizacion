<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/conexion.php';
$resultado = $conexion->query("SELECT * FROM estudiantes");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Estudiantes</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h2>👩‍🎓 Gestión de Estudiantes</h2>

    <form action="../controllers/estudianteController.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <button type="submit">Agregar</button>
    </form>

    <h3>Lista de Estudiantes</h3>
    <table border="1" style="margin:auto; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acción</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['apellido'] ?></td>
            <td>
                <a href="../controllers/estudianteController.php?eliminar=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar estudiante?')">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="panel.php">⬅️ Volver al panel</a>
</body>
</html>
