<?php 
    class Product{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        
        }

        public function getAllProducts(){
            try{
                $sql = "SELECT * FROM products";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function RelationProductKategori($id){
            $sql = "SELECT products.*,kategori.* FROM products INNER JOIN kategori on products.id_kategori = kategori.id WHERE products.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function getRowProduct(){
            try{
                $sql = "SELECT * FROM products";
                $result = $this->db->query($sql);

                return $result->rowCount();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function getProduct($id){
            try{
                $sql = "SELECT * FROM products where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function createProduct($nama, $price, $deskripsi,$id_kategori,$image){
            try{
                $sql = "INSERT INTO products (name,price,deskripsi,id_kategori,image) VALUES (:name,:price,:deskripsi,:id_kategori,:image)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":name", $nama);
                $stmt->bindparam(":price", $price);
                $stmt->bindparam(":deskripsi", $deskripsi);
                $stmt->bindparam(":id_kategori", $id_kategori);
                $stmt->bindparam(":image", $image);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function updateProduct($id,$nama, $price, $image){
            try{
                $dt = new DateTime();
                $sql = "UPDATE `products` SET `name`=:name,`price`=:price,`image`=:image,`updated_at`=:updated_at WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->bindparam(":name", $nama);
                $stmt->bindparam(":price", $price);
                $stmt->bindparam(":image", $image);
                $stmt->bindparam(":updated_at",$dt->format('Y-m-d H:i:s'));
                $stmt->execute();
                echo $dt->format('Y-m-d H:i:s');
                return true;
            }catch(PDOException $e){
                $e->getMessage();
                return false;
            }
        }

        public function deleteProduct($id){
            try{
                $sql = "DELETE FROM `products` WHERE id = :id";
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