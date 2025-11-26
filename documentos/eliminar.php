<?php
include("../config/conexion.php");

$id = $_GET['id'];
$conexion->query("DELETE FROM documentos WHERE id = $id");
header("Location: listar.php");
exit;
?>
