<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "esencia");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $conn->real_escape_string($_POST['nombre']);
$email = $conn->real_escape_string($_POST['email']);

// Verificar si el email ya existe
$sql_check = "SELECT id FROM accesos WHERE email = '$email'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Si ya existe, simplemente redirige
    header("Location: principal.html");
    exit();
}

// Insertar nuevo registro
$sql = "INSERT INTO accesos (nombre, email) VALUES ('$nombre', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: yoyo.html");
    exit();
} else {
    echo "Error al guardar los datos: " . $conn->error;
    echo "<br><a href='http://localhost/mi_proyecto.html/principal.html'>Volver</a>";
}

$conn->close();
?>
