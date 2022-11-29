<?php 
    class Order{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getAllOrders(){
            try{
                $sql = "SELECT * FROM orders";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getOrder($id){
            try{
                $sql = "SELECT * FROM orders where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getOrderById($id){
            try{
                $sql = "SELECT * FROM `orders` WHERE user_id = :user_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam('user_id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function createOrder($nama,$telepon,$email,$alamat,$kota,$provinsi,$kodepos,$user_id,$metode_pembayaran,$total_price,$total_product){
            try{
                $sql = "INSERT INTO `orders` (name,number,email,alamat,kota,provinsi,kodepos,user_id,metode_pembayaran,total_product,total_price) VALUES(:name,:number,:email,:alamat,:kota,:provinsi,:kodepos,:user_id,:metode_pembayaran,:total_price,:total_product)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":name",$nama);
                $stmt->bindparam(":number",$telepon);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":alamat",$alamat);
                $stmt->bindparam(":kota",$kota);
                $stmt->bindparam(":provinsi",$provinsi);
                $stmt->bindparam(":kodepos",$kodepos);
                $stmt->bindparam(":user_id",$user_id);
                $stmt->bindparam(":metode_pembayaran",$metode_pembayaran);
                $stmt->bindparam(":total_product",$total_product);
                $stmt->bindparam(":total_price",$total_price);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function deleteOrder($id){
            try{
                $sql = "DELETE FROM `orders` WHERE id = :id";
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