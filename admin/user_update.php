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
        require "repository/user.php";

        $pdo = Database::connect();
        $user = new User($pdo);

        if(!isset($_GET['id'])){
            header("Location: kategori.php");
        }else{
            $id = $_GET['id'];
            $result = $user->getUser($id);
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
                        <form action="user_update_act.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>" />
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" value="<?php echo $result['firstname']; ?>" name="firstname" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" value="<?php echo $result['lastname']; ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" value="<?php echo $result['username']; ?>" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" value="<?php echo $result['password']; ?>" name="password" class="form-control" id="password" aria-describedby="emailHelp">
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