<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "esencia";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$articulo = $_POST['articulo'];
$cantidad = $_POST['cantidad'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO ordenes (articulo, cantidad, nombre, correo, telefono)
        VALUES ('$articulo', '$cantidad', '$nombre', '$correo', '$telefono')";

if ($conn->query($sql) === TRUE) {
    header("Location: principal.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
