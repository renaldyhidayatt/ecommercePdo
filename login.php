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
    include_once "navbar.php";
    ?>
    <?php 
        require "admin/repository/user.php";

        $pdo = Database::connect();
        $user = new User($pdo);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $isSuccess = $user->getUserByUsername($username);
                
                if($isSuccess){
                    $hashedPasswod = $isSuccess['password'];
                    if(password_verify($password, $hashedPasswod)){
                        session_start();
                        $_SESSION['username'] = $isSuccess['username'];
                        $_SESSION['id_username'] = $isSuccess['id'];
                        
                        $_SESSION['isUserLoggedIn'] = true;
                        header("Location: index.php");
                        return true;
                    }else{
                        echo $isSuccess['firstname'];
                        echo "Error Password";
                    }
                }else{
                    echo "Error";
                }

            }
        }
    ?>
    <div class="container">
        
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
                        <h4>Welcome Back, Login</h4>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-dark float-end">Login</button>
                        </div>
                        <div class="text-center pt-2">
                            <div class="text-center pt-2">
                                <a href="./register.php" class="btn text-primary">Signup Now !</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>