<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/conexion.php';

$rol = $_SESSION['rol'];
$id_usuario = $_SESSION['id_usuario'];

$buscar = isset($_GET['buscar']) ? $conexion->real_escape_string($_GET['buscar']) : '';

// Consulta base
if ($rol === 'admin') {
    $sql = "SELECT * FROM documentos";
} else {
    $sql = "SELECT * FROM documentos WHERE id_usuario = $id_usuario";
}

// Agregar filtro de búsqueda
if (!empty($buscar)) {
    $sql .= ($rol === 'admin')
        ? " WHERE titulo LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'"
        : " AND (titulo LIKE '%$buscar%' OR descripcion LIKE '%$buscar%')";
}

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
    <h2><img src="../documentos/SanBenitoMenni.png" alt="Logo" width="60" style="vertical-align:middle; margin-right:10px;"> Lista de Documentos</h2>
    <form method="GET" style="text-align:center; margin-bottom:20px;">
        <input type="text" name="buscar" placeholder="Buscar documento..." 
            value="<?= isset($_GET['buscar']) ? $_GET['buscar'] : '' ?>">
        <button type="submit">🔎 Buscar</button>
    </form>


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
