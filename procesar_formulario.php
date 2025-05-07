<?php
// Configuración de la base de datos
$host = 'localhost'; // o el servidor de tu base de datos
$usuario = 'root';
$clave = '';
$base_datos = 'contacto_db';

// Conexión a la base de datos
$conn = new mysqli($host, $usuario, $clave, $base_datos);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO mensajes_contacto (nombre, email, asunto, mensaje) 
        VALUES ('$nombre', '$email', '$asunto', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
