<?php 
    require "include/database.php";
    require "repository/kategori.php";

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];

        $pdo = Database::connect();
        $kategori = new Kategori($pdo);
        $isSuccess = $kategori->createKategori($nama);
        if($isSuccess){
            header("Location: kategori.php");

        }else{
            echo "Error";
        }
    }
?>