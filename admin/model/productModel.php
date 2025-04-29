<?php
// admin/model/productModel.php
require_once './admin/model/database.php';

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCategories() {
        $sql = "SELECT id, ten FROM danhmuc";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($idDM) {
        $sql = "SELECT * FROM danhmuc WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute(['id' => $idDM]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($data) {
        $sql = "INSERT INTO sanpham (ten, image, gia, giakhuyenmai, idDM, soluong, mota, hot, trangthai) 
                VALUES (:ten, :image, :gia, :giakhuyenmai, :idDM, :soluong, :mota, :hot, :trangthai)";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM sanpham WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM sanpham";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateProduct($data) {
        $sql = "UPDATE sanpham SET ten = :ten, image = :image, gia = :gia, giakhuyenmai = :giakhuyenmai, 
                idDM = :idDM, soluong = :soluong, mota = :mota, hot = :hot, trangthai = :trangthai 
                WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM sanpham WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
