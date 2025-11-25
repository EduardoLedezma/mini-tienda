<?php
require_once '../../app/controllers/ProductController.php';

ProductController::delete($_GET['id']);
header("Location: products.php");
exit;
