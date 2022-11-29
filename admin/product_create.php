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
    <!-- offcanvas -->
    <?php include_once "./include/sidebar.php"; ?>

    <?php 
        require "repository/kategori.php";
        $kategori = new Kategori($pdo);

        $result = $kategori->getAllKategori();

    ?>
    
    
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Create Product
                    </div>
                    <div class="card-body">
                        <form action="product_create_act.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" id="price" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    <option value="#">Pilih Kategori</option>
                                    <?php 
                                        foreach($result as $row){
                                            
                                        
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_kategori'] ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
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