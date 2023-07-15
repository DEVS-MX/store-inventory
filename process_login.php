<?php
// procesar_login.php
session_start();
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Consultar el usuario con las credenciales proporcionadas
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Inicio de sesión exitoso
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];

        // Redireccionar al panel de control o página de inicio
        header('Location: index.php?page=home');
        exit();
    } else {
        // Credenciales inválidas
        echo "Credenciales inválidas";
    }
}
?>
