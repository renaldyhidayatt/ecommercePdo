<?php 
    require "include/database.php";
    require "repository/barang_crud.php";

    $pdo = Database::connect();
    $barang = new Barang_Crud($pdo);

    if(!isset($_GET['id'])){
        header("Location: barang.php");
    }else{
        $id = $_GET['id'];
        $result = $barang->deleteBarang($id);

        if($result){
            header("Location: barang.php");
        }else{
            echo "Error Delete";
        }
    }
?>