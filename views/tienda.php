<?php 
require_once '../app/models/Product.php'; 
$products = Product::all();
$title = "Tienda";

ob_start();
?>

<h1 style="text-align:center; margin-bottom:25px;">🛍️ Mini Tienda</h1>

<div class="products">
<?php foreach($products as $p): ?>
    <div class="item">
        <img src="../public/img/<?= $p['image'] ?>" alt="">
        <h3><?= $p['name'] ?></h3>
        <p>$<?= $p['price'] ?></p>
        <a href="ver.php?id=<?= $p['id'] ?>">Ver producto</a>
    </div>
<?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
