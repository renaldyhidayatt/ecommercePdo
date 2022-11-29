<?php 
    require "include/database.php";
    require "repository/kategori.php";

    $pdo = Database::connect();
    $kategori = new Kategori($pdo);

    if(!isset($_GET['id'])){
        header("Location: kategori.php");
    }else{
        $id = $_GET['id'];
        $result= $kategori->deleteKategori($id);
        if($result){
            header("Location: kategori.php");
        }else{
            echo "Error Delete";
        }
    }
?>