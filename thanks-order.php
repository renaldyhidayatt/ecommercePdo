<!DOCTYPE html>
<html lang="en">

<head>
    <title>Terima Kasih Yang sudah Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include "navbar.php";
    if (isset($_SESSION['id_username'])) {

        $result = $cart->getCartByIdUser($_SESSION['id_username']);
    } 
    ?>
    <div class="row mt-3 justify-content-center">
        <h3 class="text-center mb-4">Terima Kasih yang sudah order ditoko kami</h3>
        <div class="col-md-2">

            <a href="index.php" class="btn btn-success">Ke Halaman Index</a>
        </div>
        <div class="col-md-2">
            <a href="order-history.php" class="btn btn-primary">Ke Halaman Order</a>
        </div>
    </div>
</body>

</html>