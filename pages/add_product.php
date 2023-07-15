<?php
// crear_producto.php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $tags = $_POST['tags'];
    $publicado = $_POST['publicado'];

    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Insertar el nuevo producto en la base de datos
    $stmt = $conn->prepare('INSERT INTO productos (nombre, precio, stock, tags, publicado) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nombre, $precio, $stock, $tags, $publicado]);

    // Redireccionar a la lista de productos
    header('Location: index.php?page=list_products');
    exit();
}
?>

<!-- Formulario para crear un nuevo producto -->
<form method="POST" action="index.php?page=add_product">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>

    <label for="tags">Tags:</label>
    <input type="text" name="tags">

    <label for="publicado">Publicado:</label>
    <input type="checkbox" name="publicado" value="1">

    <button type="submit">Guardar</button>
</form>
