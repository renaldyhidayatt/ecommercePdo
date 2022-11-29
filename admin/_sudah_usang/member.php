<?php 
    class Member{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getAllMembers(){
            try{
                $sql = "SELECT * FROM member";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getMembers($id){
            try{
                $sql = "SELECT * FROM member where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function createMember($nama,$alamat,$telepon,$email){
            try{
                $sql = "INSERT INTO `member`(nama_member, alamat,telepon,email) VALUES (:nama,:alamat,:telepon,:email)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":nama", $nama);
                $stmt->bindparam(":alamat",$alamat);
                $stmt->bindparam(":telepon",$telepon);
                $stmt->bindparam(":email",$email);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function updateMember($id, $nama,$alamat,$telepon,$email){
            try{
                $dt = new DateTime();
                $sql = "UPDATE `member` SET `nama_member`=:nama,`alamat`=:alamat,`telepon`=:telepon,`email`=:email,`updated_at`=:updated_at WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam("id", $id);
                $stmt->bindparam(":nama", $nama);
                $stmt->bindparam(":alamat",$alamat);
                $stmt->bindparam(":telepon",$telepon);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":updated_at",$dt->format('Y-m-d H:i:s'));
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function deleteMember($id){
            try{
                $sql = "DELETE FROM `member` WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){    
                return $e->getMessage();
            }
        }
    }
?>
