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
    
    
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <form action="barang_create_act.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <input type="text" name="jenis" class="form-control" id="jenis">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                            </div>
                            <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" name="supplier" class="form-control" id="supplier">
                            </div>
                            <div class="mb-3">
                                <label for="modal" class="form-label">Modal</label>
                                <input type="text" name="modal" class="form-control" id="modal">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" id="jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="sisa" class="form-label">Sisa</label>
                                <input type="number" name="sisa" class="form-control" id="sisa">
                            </div>
                            <div class="mb-3">
                                <label for="fotobarang">Foto Barang</label>
                                <input require type="file" class="form-control" name="fotobarang" id="fotobarang" />
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