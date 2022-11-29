<?php 
    require "include/database.php";
    require "repository/member.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $pdo = Database::connect();
        $member = new Member($pdo);
        $isSuccess = $member->updateMember($id, $nama,$alamat,$telepon,$email);

        if($isSuccess){
            header("Location: member.php");
        }else{
            echo "Error Update Member";
        }
    }
?>