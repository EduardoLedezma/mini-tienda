<?php
require_once __DIR__ . '/../../config/db.php';

class Product {

    public static function all(){
        global $pdo;
        return $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id){
        global $pdo;
        $q = $pdo->prepare("SELECT * FROM products WHERE id=?");
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }
}
