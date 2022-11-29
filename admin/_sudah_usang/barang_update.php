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
        require "./include/database.php";
        require "./repository/barang_crud.php";

        $pdo = Database::connect();
        $barang = new Barang_Crud($pdo);

        if(!isset($_GET['id'])){
            header("Location: barang.php");
        }else{
            $id = $_GET['id'];
            $result = $barang->getBarang($id);
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
                        <form action="barang_update_act.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>" />
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" value="<?php echo $result['nama'] ?>" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <input type="text" value="<?php echo $result['jenis']; ?>" name="jenis" class="form-control" id="jenis">
                            </div>
                            <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" value="<?php echo $result['supplier'] ?>" name="supplier" class="form-control" id="supplier">
                            </div>
                            <div class="mb-3">
                                <label for="modal" class="form-label">Modal</label>
                                <input type="text" value="<?php echo $result['modal'] ?>" name="modal" class="form-control" id="modal">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" value="<?php echo $result['harga']; ?>" name="harga" class="form-control" id="harga">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" value="<?php echo $result['jumlah'] ?>" name="jumlah" class="form-control" id="jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="sisa" class="form-label">Sisa</label>
                                <input type="number" value="<?php echo $result['sisa']; ?>" name="sisa" class="form-control" id="sisa">
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