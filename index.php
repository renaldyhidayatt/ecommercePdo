<!DOCTYPE html>
<html>

<head>
    <title>Tugas Kelompok 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php 
        include 'navbar.php';
        require "admin/repository/product.php";

        $product = new Product($pdo);
        $result = $product->getAllProducts();
    ?>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-4 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Toko Kelompok 2</h1>
            </div>
        </div>
    </header>
    <section class="py-5">
        <h1 class="text-center">
            Barang electronik yang dijualkan
        </h1>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                    if (!empty($result)) {
                        foreach ($result as $row) {
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>" />
                        
                        <a style="text-decoration: none;" href="product.php?id=<?php echo $row['id']; ?>">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['name']; ?></h5>
                                    <!-- Product price-->
                                    <?php echo "Rp.".$row['price']; ?>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                </div>
                <?php 
                        }
                    }else{
                        echo "<div class='col mb-5'>
                            <h1>Tidak Ada Product</h1>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </section>
    <?php 
        include "./footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>