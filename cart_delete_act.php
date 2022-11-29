<?php 
    require "admin/include/database.php";
    require "admin/repository/cart.php";

    $pdo = Database::connect();
    $cart = new Cart($pdo);

    if(!isset($_GET['id'])){
        header("Location: cart.php");
    }else{
        $id = $_GET['id'];
        $result = $cart->deleteCart($id);
        if($result){
            header("Location: index.php");
        }else{
            echo "Error Delete";
        }
    }
?>