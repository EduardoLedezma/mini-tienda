<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Mini Tienda" ?></title>
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Script Dark Mode -->
    <script src="../public/js/darkmode.js" defer></script>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <a class="nav-brand" href="tienda.php">🛍️ MiniTienda</a>
    </div>

    <div class="nav-right">
        <a href="cart.php">Carrito</a>

        <?php if(isset($_SESSION['user'])): ?>
            <span class="user-name">Hola, <?= $_SESSION['user']['name'] ?></span>
            <a href="logout.php">Salir</a>
        <?php else: ?>
            <a href="auth/login.php">Entrar</a>
        <?php endif; ?>

        <!-- Botón de modo oscuro -->
        <button id="darkToggle">🌙</button>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="content">
    <?= $content ?? '' ?>
</div>

<!-- FOOTER -->
<footer class="footer">
    <p>© <?= date("Y") ?> Mini Tienda — Desarrollado por Jesús</p>
</footer>

</body>
</html>
