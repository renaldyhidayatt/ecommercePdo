<?php 
    require "include/database.php";
    require "repository/user.php";

    $pdo = Database::connect();
    $user = new User($pdo);

    if(!isset($_GET['id'])){
        header("Location: user.php");
    }else{
        $id = $_GET['id'];
        $result = $user->deleteUser($id);
        if($result){
            header("Location: user.php");
        }else{
            echo "Error Delete";
        }
    }
?>