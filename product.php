<!DOCTYPE html>
<html>

<head>
    <title>Tugas Kelompok 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .app {
            text-align: center;
        }

        p {
            text-align: left !important;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php
    require "admin/repository/product.php";
    require "admin/repository/kategori.php";
    // session_start();
    $product = new Product($pdo);
    $kategori = new Kategori($pdo);
    if (!isset($_GET['id'])) {
        header("Location: index.php");
    } else {
        $id = $_GET['id'];
        $result = $product->getProduct($id);
        $resultkategori = $kategori->getKategori($result['id_kategori']);
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit-cart'])) {
            $productname = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = 1;
            $id_username = $_SESSION['id_username'];
            

            $selectcart = $cart->getRowCartByName($productname);

            if ($selectcart > 0) {
                echo "Product Sudah ditambahkan dicart";
            } else {
                $isSuccess = $cart->createCart($productname, $product_price, $product_image, $product_quantity, $id_username);
                if($isSuccess){
                    header("Location: cart.php");
                }else{
                    echo $isSuccess;
                    echo "Error";
                }
            }
        }
    }
    ?>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 p-3 mb-3 bg-white rounded">
                <div class="card p-2 m-2">
                    <h1><?php echo $result['name'] ?></h1>
                    <img src="<?php echo $result['image'] ?>" alt="<?php echo $result['name']; ?>" />

                    <p><?php echo $result['deskripsi']; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="m-2 mb-4">
                    <h1>Kategori: <?php echo $resultkategori['nama_kategori'] ?></h1>
                    <h1>Harga: Rp.<?php echo $result['price']; ?></h1>
                    <hr />
                    <?php

                    $auth = new Auth();
                    if($auth->isLoggedIn()){
                    ?>
                    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
                        <input type='hidden' name='product_name' value='<?php echo $result['name']; ?>'>
                        <input type='hidden' name='product_price' value='<?php echo $result['price']; ?>'>
                        <input type='hidden' name='product_image' value='<?php echo $result['image']; ?>'>
                        <button type="submit" name="submit-cart" class='btn btn-dark'>Add Cart</button>
                    </form>
                    <?php 
                        }else{
                            echo "<h3>Login dulu</h3>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>