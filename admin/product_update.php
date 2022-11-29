<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Kelompok 2</title>
</head>

<body>

    <?php include_once "./include/navbar.php"; ?>
    offcanvas
    <?php include_once "./include/sidebar.php"; ?>
    <?php 
        require "repository/product.php";

        $product = new Product($pdo);

        

        if(!isset($_GET['id'])){
            header("Location: product.php");
        }else{
            $id = $_GET['id'];
            $result = $product->getProduct($id);

            // echo $result;
        }

       
    ?>
    <main class="mt-5 pt-3">
        
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <form action="product_update_act.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>" />
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama </label>
                                <input type="text" value="<?php echo $result['name'] ?>" name="name" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" value="<?php echo $result['price']; ?>" name="price" class="form-control" id="price" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>