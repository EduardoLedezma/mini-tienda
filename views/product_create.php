<?php
session_start();
require_once '../../app/controllers/ProductController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    ProductController::create($_POST, $_FILES);
   header('Location: products.php');
exit;
}
    
$title = "Crear Producto";
ob_start();
?>

<h1>➕ Crear Producto</h1>

<form method="POST" enctype="multipart/form-data" class="form-box">

    <label>Nombre del producto</label>
    <input type="text" name="name" required>

    <label>Precio</label>
    <input type="number" step="0.01" name="price" required>

    <label>Stock</label>
    <input type="number" name="stock" required>

    <label>Descripción</label>
    <textarea name="description"></textarea>

    <label>Imagen</label>
    <input type="file" name="image" required>

    <button class="btn">Crear</button>
</form>

<?php
$content = ob_get_clean();
include '../layout_admin.php';
?>
