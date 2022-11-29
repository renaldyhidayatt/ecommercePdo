<?php 
    require "include/database.php";
    require "repository/barang_crud.php";
    
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $supplier = $_POST['supplier'];
        $modal = $_POST['modal'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $sisa = $_POST['sisa'];
        $update_at = new DateTime();

        $pdo = Database::connect();
        $barang = new Barang_Crud($pdo);
        $isSuccess = $barang->updateBarang($id,$nama,$jenis,$supplier,$modal,$harga,$jumlah,$sisa);
        if($isSuccess){
            echo "Success Update Barang";
            header("Location: barang.php");
        }else{
            echo "Error Update Barang";
        }
        Database::disconnect();
    }
?>