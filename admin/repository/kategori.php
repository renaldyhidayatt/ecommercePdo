<?php 
    class Kategori{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getAllKategori(){
            try{
                $sql = "SELECT * FROM kategori";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getKategori($id){
            try{

                $sql = "SELECT * FROM kategori where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();

                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        // 

        public function createKategori($nama){
            try{
                $sql = "INSERT INTO kategori(nama_kategori) VALUES(:nama)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":nama", $nama);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                $e->getMessage();
                return false;
            }
        }

        public function updateKategori($id, $nama){
            try{
                $dt = new DateTime();
                $sql = "UPDATE `kategori` SET `nama_kategori`=:nama,`updated_at`=:updated_at WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->bindparam(":nama", $nama);
                $stmt->bindparam(":updated_at", $dt->format('Y-m-d H:i:s'));
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                return $e->getMessage();
            
            }
        }

        public function deleteKategori($id){
            try{
                $sql = "DELETE FROM `kategori` WHERE id = :id";
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