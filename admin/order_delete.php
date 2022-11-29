<?php 
    require "include/database.php";
    require "repository/order.php";

    $pdo = Database::connect();
    $order = new Order($pdo);

    if(!isset($_GET['id'])){
        header("Location: order.php");
    }else{
        $id = $_GET['id'];
        $result = $order->deleteOrder($id);
        if($result){
            header("Location: order.php");
        }else{
            echo "Error Delete";
        }
    }
?>