<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        session_destroy();
        session_unset();
        header("Location: ../login.php");
    }
?>