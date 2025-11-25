<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    die('No autorizado');
}

// Verificar si existe el rol
if (!isset($_SESSION['user']['role'])) {
    die('No autorizado');
}

// Verificar que el rol sea admin
if ($_SESSION['user']['role'] !== 'admin') {
    die('No autorizado');
}

// Importar el modelo
require_once '../../app/models/Product.php';

// Obtener productos
$products = Product::all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .product-item {
            background: white;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 4px;
            box-shadow: 0px 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h1>Panel de Administración</h1>

<?php foreach ($products as $item): ?>
    <div class="product-item">
        <?= htmlspecialchars($item['name']); ?>
    </div>
<?php endforeach; ?>

</body>
</html>
