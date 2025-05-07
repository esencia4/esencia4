<?php
// Configuración de la base de datos
$host = 'localhost';  // Cambia si estás usando un servidor remoto
$dbname = 'formulario'; // Nombre de la base de datos
$username = 'root'; // Nombre de usuario (por defecto es 'root' en muchos servidores locales)
$password = ''; // Contraseña (deja en blanco en muchos servidores locales)

// Conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos: " . $e->getMessage());
}

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta
    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email
        ]);
        // Si todo sale bien, redirigir al usuario a la página principal
        header("");
        exit();
    } catch (PDOException $e) {
        // En caso de error, mostrar mensaje
        echo "Error al guardar los datos: " . $e->getMessage();
    }
} else {
    // Si el archivo no fue accedido mediante POST, redirigir al formulario
    header("Location: index.html");
    exit();
}
?>
