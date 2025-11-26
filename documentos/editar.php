<?php
include("../config/conexion.php");

$id = $_GET['id'];
$query = "SELECT * FROM documentos WHERE id = $id";
$resultado = $conexion->query($query);
$doc = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    $conexion->query("UPDATE documentos SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria WHERE id=$id");
    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Documento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">✏️ Editar Documento</h2>

    <form method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $doc['titulo'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"><?= $doc['descripcion'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select" required>
                <option value="1" <?= $doc['categoria_id']==1?'selected':'' ?>>Docentes</option>
                <option value="2" <?= $doc['categoria_id']==2?'selected':'' ?>>Estudiantes</option>
                <option value="3" <?= $doc['categoria_id']==3?'selected':'' ?>>Instructivos</option>
                <option value="4" <?= $doc['categoria_id']==4?'selected':'' ?>>Cartas</option>
                <option value="5" <?= $doc['categoria_id']==5?'selected':'' ?>>PDFs</option>
                <option value="6" <?= $doc['categoria_id']==6?'selected':'' ?>>Fotos y Videos</option>
                <option value="7" <?= $doc['categoria_id']==7?'selected':'' ?>>Rude/Boletines</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">💾 Guardar</button>
        <a href="listar.php" class="btn btn-secondary">⬅️ Volver</a>
    </form>
</div>
</body>
</html>
