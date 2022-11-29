<?php 
    require "include/database.php";
    require "repository/product.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $deskripsi = $_POST['deskripsi'];
            $id_kategori = $_POST['id_kategori'];
            $image = $_FILES['image']['tmp_name'];
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $target_dir = "uploads/";
            $destination = "$target_dir$name.$extension";
            move_uploaded_file($image, "../".$destination);

            $pdo = Database::connect();
            $product = new Product($pdo);
            $isSuccess = $product->createProduct($name,$price, $deskripsi,$id_kategori,$destination);
            if($isSuccess){
                echo "Success Insert Product";
                header("Location: product.php");
            }else{
                echo $isSuccess;
                echo "Error Insert Product";
            }
        }
    
    }
    Database::disconnect();
?>