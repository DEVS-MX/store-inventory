<?php
// lista_productos.php
include 'config/config.php';

// Conexión a la base de datos
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Obtener la lista de productos
$stmt = $conn->query('SELECT * FROM productos');
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Tabla de productos -->
<table>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Tags</th>
        <th>Publicado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto) { ?>
        <tr>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td><?= $producto['stock'] ?></td>
            <td><?= $producto['tags'] ?></td>
            <td><?= $producto['publicado'] ? 'Sí' : 'No' ?></td>
            <td>
                <a href="index.php?page=edit_product&id=<?= $producto['id'] ?>">Editar</a>
                <a href="index.php?page=delete_product&id=<?= $producto['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
