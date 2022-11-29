<?php 
    require "include/database.php";
    require "repository/kategori.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        $pdo = Database::connect();
        $kategori = new Kategori($pdo);
        $isSuccess = $kategori->updateKategori($id, $nama);

        if($isSuccess){
            header("Location: kategori.php");
        }else{
            echo "Error Update Kategori";
        }

        Database::disconnect();
    }
?>