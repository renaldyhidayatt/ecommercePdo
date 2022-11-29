<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tugas Kelompok 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once "./navbar.php";
    ?>
    <?php 
        require "admin/repository/user.php";

       
        $user = new User($pdo);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $isSuccess = $user->createUser($firstname,$lastname,$username,$hashedPassword);
                if($isSuccess){
                    header("Location: login.php");
                }else{
                    echo "Error Register";
                }
            }
        }
        Database::disconnect();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                                <h4>Register</h4>
                                <div class="col-12">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                                </div>
                                <div class="col-12">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                                </div>
                                <div class="col-12">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="col-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-dark float-end">Register</button>
                                </div>
                                <div class="text-center pt-2">
                                    <div class="text-center pt-2">
                                        <a href="login.php" class="btn text-primary">Login Now</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>