<?php 
    require "include/database.php";
    require "repository/product.php";

    $pdo = Database::connect();
    $product = new Product($pdo);

    if(!isset($_GET['id'])){
        header("Location: product.php");
    }else{
        $id = $_GET['id'];
        $result = $product->deleteProduct($id);

        if($result){
            header("Location: product.php");
        }else{
            echo "Error Delete";
        }
    }

?>