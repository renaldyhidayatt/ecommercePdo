<?php 
    class Barang{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function BarangRelationKategori(){
            try{
                $sql = "select barang.*, kategori.id, kategori.nama_kategori
                from barang inner join kategori on barang.id = kategori.id 
                ORDER BY id DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        function barang_stok(){
            try{
                $sql = "select barang.*, kategori.id, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id 
						where stok <= 3 
						ORDER BY id DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        function barang_edit($id){
            try{
                $sql = "select barang.*, kategori.id, kategori.nama_kategori
						from barang inner join kategori on barang.id = kategori.id
						where id_barang=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam("id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>
