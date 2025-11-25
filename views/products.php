<?php
require_once '../../app/models/Product.php';
session_start();

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    die("Acceso denegado");
}

$products = Product::all();

$title = "Administrar Productos";
ob_start();
?>

<h1 style="margin-bottom:25px;">🛠️ Administrar Productos</h1>

<a href="product_create.php" class="btn">➕ Agregar nuevo producto</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><img src="../../public/img/<?= $p['image'] ?>" class="admin-img"></td>
            <td><?= $p['name'] ?></td>
            <td>$<?= $p['price'] ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
                <a class="btn-edit" href="product_edit.php?id=<?= $p['id'] ?>">Editar</a>
                <a class="btn-delete" href="product_delete.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('¿Eliminar este producto?')">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include '../layout_admin.php';
?>
