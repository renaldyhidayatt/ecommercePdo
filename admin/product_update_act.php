<?php 
     require "include/database.php";
     require "repository/product.php";

     $pdo = Database::connect();
     $product = new Product($pdo);

     if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['tmp_name'];
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $target_dir = "uploads/";
        $destination = "$target_dir$name.$extension";
        move_uploaded_file($image, "../".$destination);

        $isSuccess = $product->updateProduct($id,$name,$price,$destination);
        if($isSuccess){
            echo "Success Update Product";
            header("Location: product.php");
        }else{
            echo "Error Product Barang";
        }
        Database::disconnect();
     }
?>