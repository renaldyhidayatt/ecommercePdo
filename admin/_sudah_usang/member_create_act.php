<?php 
    require "include/database.php";
    require "repository/member.php";

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];

        $pdo = Database::connect();
        $member = new Member($pdo);
        $isSuccess = $member->createMember($nama,$alamat,$telepon,$email);
        if($isSuccess){
            header("Location: member.php");
        }else{
            echo "Error";
        }
    }
?>