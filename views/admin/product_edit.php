<?php
session_start();
require_once '../../app/models/Product.php';
require_once '../../app/controllers/ProductController.php';

$p = Product::find($_GET['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    ProductController::update($_GET['id'], $_POST, $_FILES);
    header("Location: products.php");
    exit;
}

$title = "Editar Producto";
ob_start();
?>

<h1>✏️ Editar Producto</h1>

<form method="POST" enctype="multipart/form-data" class="form-box">

    <label>Nombre</label>
    <input type="text" name="name" value="<?= $p['name'] ?>" required>

    <label>Precio</label>
    <input type="number" name="price" step="0.01" value="<?= $p['price'] ?>" required>

    <label>Stock</label>
    <input type="number" name="stock" value="<?= $p['stock'] ?>" required>

    <label>Descripción</label>
    <textarea name="description"><?= $p['description'] ?></textarea>

    <p>Imagen actual:</p>
    <img src="../../public/img/<?= $p['image'] ?>" width="150">

    <label>Subir nueva imagen (opcional)</label>
    <input type="file" name="image">

    <button class="btn">Actualizar</button>
</form>

<?php
$content = ob_get_clean();
include '../layout_admin.php';
?>
