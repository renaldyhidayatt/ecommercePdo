<?php 
    class Auth{
        
        public function __construct()
        {
            
        }

        

        public function isLoggedIn(){
            if(isset($_SESSION['isUserLoggedIn'])) {
                return $_SESSION['isUserLoggedIn'] ? true : false;
            }
        }

    }
?>