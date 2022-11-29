<?php
    require "include/database.php";
    require "repository/barang_crud.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $deskripsi = $_POST['deskripsi'];
        $supplier = $_POST['supplier'];
        $modal = $_POST['modal'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $sisa = $_POST['sisa'];

        $dt = new DateTime();
        echo $dt->format('Y-m-d H:i:s');

        $foto_barang = $_FILES['fotobarang']['tmp_name'];
        $extension = pathinfo($_FILES['fotobarang']['name'], PATHINFO_EXTENSION);
        
       
        $target_dir = "uploads/";
        $destination = "$target_dir$nama.$extension";
        move_uploaded_file($foto_barang, "../".$destination);

        echo $extension;

        $pdo = Database::connect();
        $barang = new Barang_Crud($pdo);
        $isSuccess = $barang->insertBarang($nama, $jenis, $deskripsi, $supplier, $modal, $harga, $jumlah, $sisa, $destination);
        if ($isSuccess) {
            echo "Success Insert Barang";
            // header("Location: barang.php");
        } else {
            echo "Error Insert Barang";
        }
    }
    Database::disconnect();
?>