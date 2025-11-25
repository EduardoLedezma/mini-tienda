<?php 
session_start();
require_once '../app/models/Product.php'; 
$title = "Carrito";
ob_start();
?>

<h1 style="text-align:center;">🛒 Tu carrito</h1>

<?php 
if (!empty($_SESSION['cart'])):
    foreach ($_SESSION['cart'] as $c):
        $p = Product::find($c);
?>
        <div class="product-box" style="margin-bottom:20px;">
            <h2><?= $p['name'] ?></h2>
            <p>$<?= $p['price'] ?></p>
        </div>
<?php endforeach; else: ?>
    <p style="text-align:center;">Tu carrito está vacío</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
