<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
   <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <img src="../documentos/SanBenitoMenni.png" alt="San Benito Menni" width="120" style="display:block; margin:auto;">
        <h2>Inicio de Sesión</h2>
            <form action="../controllers/loginController.php" method="POST">
                <label>Usuario:</label>
                <input type="text" name="usuario" required><br>

                <label>Contraseña:</label>
                <input type="password" name="contrasena" required><br>

                <button type="submit">Entrar</button>
            </form>
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>    
</body>
</html>
