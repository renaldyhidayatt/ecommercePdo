<?php 
    class User{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getAllUsers(){
            try{
                $sql = "SELECT * FROM user";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getRowUser(){
            try{
                $sql = "SELECT * FROM user";
                $result = $this->db->query($sql);

                return $result->rowCount();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getUser($id){
            try{
                $sql = "SELECT * FROM user where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getUserByUsername($username){
            try{
                $sql = "SELECT * FROM user where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username", $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function createUser($firstname, $lastname, $username, $password){
            try{
                $sql = "INSERT INTO `user`(firstname,lastname,username,password) VALUES (:firstname,:lastname,:username,:password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }

        public function updateUser($id, $firstname, $lastname, $username, $password){
            try{
                $dt = new DateTime();
                $sql = "UPDATE `user` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username,`password`=:password,`updated_at`=:updated_at WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->bindparam(":firstname", $firstname);
                $stmt->bindparam(":lastname", $lastname);
                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $password);
                $stmt->bindparam("updated_at", $dt->format('Y-m-d H:i:s'));
                $stmt->execute();
                return true;
            }catch(PDOException $e){   
                echo $e->getMessage();
            }
        }

        public function deleteUser($id){
            try{
                $sql = "DELETE FROM user WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>