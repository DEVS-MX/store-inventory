<?php
// config.php (archivo de configuración para la conexión a la base de datos)
include 'config/config.php';
try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Insertar usuario demo
    $nombre = 'Admin';
    $email = 'admin@devsmx.com';
    $password = password_hash('admin123', PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $email, $password]);

    echo 'Usuario demo insertado correctamente.';
} catch (PDOException $e) {
    echo 'Error al insertar el usuario demo: ' . $e->getMessage();
}
?>
