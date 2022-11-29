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

    if(isset($_SESSION['id_username'])){

        $result = $cart->getCartByIdUser($_SESSION['id_username']);
        $count = $cart->getRowCartById($_SESSION['id_username']);

        if($count <= 0){
            header("Location: index.php");
        }

    }else{
        header("Location: index.php");
    }

    
    ?>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8 card text-center shadow p-3 mb-3 bg-white rounded">
            <h3 class="text-center m-5">My Cart</h3>
            <table class="table table-borderered table-responsives-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($result)) {
                        foreach ($result as $row) {

                    ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><img style="width: 20%;" class="rounded" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name'] ?>" /></td>
                            <td><a href="cart_delete_act.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Apakah ingin dihapus?')" class="btn btn-danger">Hapus</td>
                        </tr>
                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>
            <hr />
            <h2 class="text-center">SubTotal: Rp:<?php echo $subtotal = $row['price'] * $row['quantity'];?></h2>
            <a href="checkout.php" class="btn btn-primary">Check Out</a>
            <!-- <div class="col-md-12">
            </div> -->
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>