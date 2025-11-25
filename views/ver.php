<?php 
require_once '../app/models/Product.php'; 
$p = Product::find($_GET['id']);
$title = $p['name'];
ob_start();
?>

<div class="product-box">
    <img src="../public/img/<?= $p['image'] ?>" alt="">
    <h1><?= $p['name'] ?></h1>
    <p style="font-size:20px; margin:10px 0;">$<?= $p['price'] ?></p>

    <form method="post" action="cart_add.php">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <button>Agregar al carrito</button>
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
