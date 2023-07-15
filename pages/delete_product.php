<?php
// eliminar_producto.php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Eliminar el producto de la base de datos
    $stmt = $conn->prepare('DELETE FROM productos WHERE id = ?');
    $stmt->execute([$id]);
    // Redireccionar a la lista de productos
    header('Location: index.php?page=list_products');
    exit();
} else {
    echo "Error: ID de producto no especificado.";
}
?>
