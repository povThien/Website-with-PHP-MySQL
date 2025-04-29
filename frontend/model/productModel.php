<?php
require_once('./frontend/model/database.php');

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getHotProduct() {
        $sql = "SELECT * FROM sanpham WHERE hot = 1 LIMIT 5";
        return $this->db->getAll($sql);
    }
    //PT
    public function getAllProduct() {
        $sql = "SELECT * FROM sanpham";
        return $this->db->getAll($sql);//PT
    }

    public function getProByCate($id) {
        $sql = "SELECT * FROM sanpham WHERE idDM = $id";
        return $this->db->getAll($sql);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM sanpham WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);//PT
    }

    public function getSimilarProducts($id) {
        $sql = "SELECT * FROM sanpham WHERE id != :id LIMIT 5";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /// phân Trang 

// Lấy tổng số sản phẩm
    public function getTotalProducts(): mixed {
        $sql = "SELECT COUNT(*) FROM sanpham";
        return $this->db->getOne($sql)['COUNT(*)'];  // Trả về số lượng sản phẩm
    }
    // Phân trang 
    //Truy vấn dữ liệu cho từng trang
    //PT
    public function getProductsByPage($offset, $limit): array {
        $sql = "SELECT * FROM sanpham LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//PT
    }

    public function laySanPhamTheoDanhMucGioiHang($idCate, $offset, $limit): array {
        $sql = "SELECT * FROM sanpham WHERE idDM = :idCate LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':idCate', $idCate, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
