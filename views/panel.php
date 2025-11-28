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
    <title>Panel Principal</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
    <img src="../documentos/SanBenitoMenni.png" alt="San Benito Menni" width="200" style="display:block; margin:auto;">
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</h2>   
    <p>Rol: <?php echo $_SESSION['rol']; ?></p>

    <a href="subir.php">📂 Subir documento</a><br>
    <a href="documentos.php">📄 Ver documentos</a><br><br>

    <a href="../controllers/logout.php">🚪 Cerrar sesión</a>
    </div>
</body>
</html>
