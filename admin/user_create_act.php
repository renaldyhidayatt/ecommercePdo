<?php 
    require "include/database.php";
    require "repository/user.php";

    $pdo = Database::connect();
    $user = new User($pdo);


    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $getUser = $user->getUserByUsername($username);
        if(!$getUser){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $isSuccess = $user->createUser($firstname, $lastname,$username,$hashedPassword);
            if($isSuccess){
                header("Location: user.php");
            }else{
                echo "Error Created";
            }
        }else{
            echo "Error";
        }
    }
?>