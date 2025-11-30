<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documento</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container"> 
        <h2><img src="../documentos/SanBenitoMenni.png" alt="Logo" width="40" style="vertical-align:middle; margin-right:10px;"> Subir Documento</h2>
        <form action="../controllers/subirController.php" method="POST" enctype="multipart/form-data">
            <label>Título:</label>
            <input type="text" name="titulo" required><br>

            <label>Descripción:</label>
            <input type="text" name="descripcion" placeholder="Descripción"><br>
             <label>Categoria:</label>
            <select name="categoria" required>
                <option value="1">Docentes</option>
                <option value="2">Estudiantes</option>
                <option value="3">Instructivos</option>
                <option value="4">Cartas</option>
                <option value="5">PDFs</option>
                <option value="6">Fotos y Videos</option>
                <option value="7">Libretas</option>
            </select><br>

            <label>Archivo:</label>
            <input type="file" class="arch" name="archivo" required>

            <button type="submit">Subir</button>
        </form>
        <br>
        <a href="panel.php">⬅️ Volver al panel</a>
    </div>
    
</body>
</html>
