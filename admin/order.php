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

    <?php include_once "include/navbar.php"; ?>
    <!-- offcanvas -->
    <?php include_once "include/sidebar.php"; ?>
    <?php
    require "repository/order.php";

    $order = new Order($pdo);
    try{
        $result = $order->getAllOrders();
        

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    

    

    Database::disconnect();
    ?>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Nomor Hp</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>KodePos</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Total Price</th>
                                        <th>Total Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (!empty($result)) {
                                        foreach ($result as $row) {


                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['number'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['kota']; ?></td>
                                                <td><?php echo $row['provinsi']; ?></td>
                                                <td><?php echo $row['kodepos']; ?></td>
                                                <td><?php echo $row['metode_pembayaran']; ?></td>
                                                <td><?php echo $row['total_price']; ?></td>
                                                <td><?php echo $row['total_product']; ?></td>
                                                <td width="250">
                                                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="order_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
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