<?php 
    require "include/database.php";
    require "repository/member.php";

    $pdo = Database::connect();
    $member = new Member($pdo);

    if(!isset($_GET['id'])){
        header("Location: member.php");
    }else{
        $id = $_GET['id'];
        $result = $member->deleteMember($id);

        if($result){
            header("Location: member.php");
        }else{
            echo "Error Delete";
        }
    }
?>