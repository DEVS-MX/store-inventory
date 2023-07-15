<?php
// editar_producto.php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $tags = $_POST['tags'];
    $publicado = $_POST['publicado'];

    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Actualizar el producto en la base de datos
    $stmt = $conn->prepare('UPDATE productos SET nombre = ?, precio = ?, stock = ?, tags = ?, publicado = ? WHERE id = ?');
    $stmt->execute([$nombre, $precio, $stock, $tags, $publicado, $id]);

    // Redireccionar a la lista de productos
    header('Location: index.php?page=list_products');
    exit();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Obtener los datos del producto a editar
    $stmt = $conn->prepare('SELECT * FROM productos WHERE id = ?');
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Formulario para editar un producto existente -->
<form method="POST" action="index.php?page=edit_product">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" value="<?= $producto['precio'] ?>" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>

    <label for="tags">Tags:</label>
    <input type="text" name="tags" value="<?= $producto['tags'] ?>">

    <label for="publicado">Publicado:</label>
    <input type="checkbox" name="publicado" value="<?= $producto['publicado'] ?>" require>

    <button type="submit">Guardar</button>
