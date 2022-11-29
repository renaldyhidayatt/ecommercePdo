<!DOCTYPE html>
<html>

<head>
    <title>Tugas Kelompok 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include 'navbar.php';
    require "admin/repository/order.php";

    $order = new Order($pdo);



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $kota = $_POST['kota'];
            $provinsi = $_POST['provinsi'];
            $kodepos = $_POST['kodepos'];
            $method_pembayaran = $_POST['metode_pembayaran'];

            $result = $cart->getCartByIdUser($_SESSION['id_username']);
            $price_total = 0;

            if ($result > 0) {
                foreach ($result as $row) {
                    $product_name[] = $row['name'] . ' (' . $row['quantity'] . ') ';
                    $product_price = $row['price'] * $row['quantity'];
                    $price_total += $product_price;
                }
            }
            $total_product = implode(", ", $product_name);
            $resultOrder = $order->createOrder($name, $number,$email,$alamat,$kota,$provinsi,$kodepos,$_SESSION['id_username'],$method_pembayaran,$total_product,$price_total);
            if($result && $resultOrder){
                
                header("Location: thanks-order.php");
                `<script type="text/javascript">
                    alert("Berhasil bro");
                </script>`;
            }
            
        }
    }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow p-3 mb-3 bg-white rounded">
                <h3 class="text-center m-5">Check Out</h3>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="name">Name:</label>
                        <input id="name" type="text" placeholder="Nama Penerima: " class="form-control" name="name" />

                    </div>
                    <div class="mb-3">
                        <label for="number">Number:</label>
                        <input id="number" type="text" placeholder="Nomor hp anda" class="form-control" name="number" />

                    </div>
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input id="email" placeholder="Email Anda: " type="text" class="form-control" name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat:</label>
                        <input id="alamat" placeholder="Alamat Anda: " type="text" class="form-control" name="alamat" required />
                    </div>
                    <div class="mb-3">
                        <label for="kota">Kota:</label>
                        <input id="kota" placeholder="Kota Anda: " type="text" class="form-control" name="kota" required />
                    </div>
                    <div class="mb-3">
                        <label for="provinsi">Provinsi :</label>
                        <input id="provinsi" placeholder="Provinsi Anda: " type="text" class="form-control" name="provinsi" required />
                    </div>
                    <div class="mb-3">
                        <label for="kode-post">Kode Pos:</label>
                        <input id="kode-post" placeholder="Kode Pos Anda: " type="text" class="form-control" name="kodepos" required />
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                            <option value="Pilih">Pilih</option>
                            <option value="Cash on delivery">Cash on Delivery</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>