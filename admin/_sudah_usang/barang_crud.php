<?php 
    class Barang_Crud{
        private $db;

        function __construct($conn)
        {  
           $this->db = $conn; 
        }

        public function getAllBarang(){
            try{
                $sql = "SELECT * FROM barang";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function insertBarang($nama, $jenis, $deskripsi,$supplier,$modal,$harga,$jumlah,$sisa, $fotobarang){
            try{
                $sql = "INSERT INTO barang (nama,jenis,deskripsi,supplier,modal,harga,jumlah,sisa,fotobarang) VALUES (:nama,:jenis,:deskripsi,:supplier,:modal,:harga,:jumlah,:sisa,:fotobarang)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":nama", $nama);
                $stmt->bindparam(":jenis", $jenis);
                $stmt->bindparam(":deskripsi", $deskripsi);
                $stmt->bindparam(":supplier",$supplier);
                $stmt->bindparam(":modal",$modal);
                $stmt->bindparam(":harga",$harga);
                $stmt->bindparam(":jumlah",$jumlah);
                $stmt->bindparam(":sisa",$sisa);
                $stmt->bindparam(":fotobarang", $fotobarang);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getBarang($id){
            try{
                $sql = "select * from barang where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function updateBarang($id,$nama, $jenis, $supplier,$modal,$harga,$jumlah,$sisa){
            try{
                $sql =  "UPDATE `barang` SET `nama`=:nama,`jenis`=:jenis,`supplier`=:supplier,`modal`=:modal,`harga`=:harga,`jumlah`=:jumlah,`sisa`=:sisa WHERE id = :id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->bindparam(":nama",$nama);
                $stmt->bindparam(":jenis", $jenis);
                $stmt->bindparam(":supplier", $supplier);
                $stmt->bindparam(":modal", $modal);
                $stmt->bindparam(":harga", $harga);
                $stmt->bindparam(":jumlah", $jumlah);
                $stmt->bindparam(":sisa", $sisa);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteBarang($id){
            try{
                $sql = "delete from barang where id = :id";
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