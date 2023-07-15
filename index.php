<?php
// panel_control.php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Obtener el nombre del usuario desde la sesión
$nombreUsuario = $_SESSION['usuario_nombre'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Inventory</title>
    <!-- Agrega aquí tus estilos y scripts comunes -->

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include("components/navbar.php") ?>
<?php include("components/sidebar.php") ?>
        <?php
        if (empty($_SERVER['QUERY_STRING'])) {
            // Redireccionar a la página de inicio ("home")
            header('Location: index.php?page=home');
            exit();
        }
        // Aquí incluirás dinámicamente el contenido de las páginas y componentes
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $pagePath = "pages/{$page}.php";

            if (file_exists($pagePath)) {
                include $pagePath;
            } else {
                echo "Página no encontrada";
            }
        }
        ?>
    <!-- Aquí puedes agregar el contenido común de tu aplicación, como el pie de página -->
    <footer>
        <p>© 2023 Mi Aplicación PHP</p>
    </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
</body>
</html>
