<?php
$conexion = new mysqli("localhost", "root", "", "escuela_digital_2");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
