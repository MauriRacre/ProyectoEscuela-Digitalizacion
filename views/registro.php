<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <img src="../documentos/SanBenitoMenni.png" alt="San Benito Menni" width="120" style="display:block; margin:auto;">
        <h2>Registro de Usuario</h2>
        <form action="../controllers/registroController.php" method="POST">
            <label>Nombre de usuario:</label>
            <input type="text" name="usuario" required><br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required><br>

            <label>Rol:</label>
            <select name="rol">
                <option value="estudiante">Estudiante</option>
                <option value="admin">Administrador</option>
            </select><br>

            <button type="submit">Registrar</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
    
</body>
</html>
