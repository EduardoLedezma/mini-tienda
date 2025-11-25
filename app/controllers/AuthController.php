<?php
require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../../config/db.php";

class ProductController {

    public static function create($data, $files){
        global $pdo;

        $img = time() . "_" . basename($files["image"]["name"]);
        move_uploaded_file($files["image"]["tmp_name"], "../../public/img/" . $img);

        $q = $pdo->prepare("INSERT INTO products(name, price, image, stock, description) 
                            VALUES (?,?,?,?,?)");
        $q->execute([
            $data['name'],
            $data['price'],
            $img,
            $data['stock'],
            $data['description']
        ]);
    }

    public static function update($id, $data, $files){
        global $pdo;

        if(!empty($files["image"]["name"])){
            $img = time() . "_" . basename($files["image"]["name"]);
            move_uploaded_file($files["image"]["tmp_name"], "../../public/img/" . $img);
        } else {
            $img = $data["old_image"] ?? Product::find($id)['image'];
        }

        $q = $pdo->prepare("UPDATE products SET name=?, price=?, image=?, stock=?, description=? WHERE id=?");
        $q->execute([
            $data['name'],
            $data['price'],
            $img,
            $data['stock'],
            $data['description'],
            $id
        ]);
    }

    public static function delete($id){
        global $pdo;
        $q = $pdo->prepare("DELETE FROM products WHERE id=?");
        $q->execute([$id]);
    }
}

