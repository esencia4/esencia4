<?php
$conexion = new mysqli("localhost", "root", "", "flr_contactx_9842");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    header("Location: gracias.html");
    exit();
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
