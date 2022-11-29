<?php 
    class Cart{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getAllCart(){
            try{
                $sql = "SELECT * FROM cart";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getRowCart(){
            try{
                $sql = "SELECT * FROM cart";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getRowCartById($id){
            try{
                $sql = "SELECT * FROM cart WHERE id_user = :id_user";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id_user", $id);
                $stmt->execute();
                $result = $stmt->rowCount();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getCartByIdUser($id){
            try{
                $sql = "SELECT * FROM `cart` WHERE id_user = :id_user";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id_user", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getRowCartByName($name){
            try{
                $sql = "SELECT * FROM `cart` WHERE name = :name";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":name", $name);
                $stmt->execute();
                $result = $stmt->rowCount();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function createCart($nama,$price,$image,$quantity,$id_username){
            try{
                $sql = "INSERT INTO `cart`(name, price, image, quantity, id_user) VALUES (:name,:price,:image,:quantity,:id_user)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":name", $nama);
                $stmt->bindparam(":price", $price);
                $stmt->bindparam(":image", $image);
                $stmt->bindparam(":quantity", $quantity);
                $stmt->bindparam(":id_user", $id_username);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function deleteCart($id){
            try{
                $sql = "DELETE FROM cart WHERE id = :id";
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