<?php

require_once('./frontend/controller/OrderController.php');
require_once('./frontend/model/database.php');
class OrderModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    // Lấy danh sách đơn hàng của khách hàng
    public function getOrdersByCustomer($customerId) {
        // Chỉ lấy các cột cần thiết
        $sql = "SELECT id, idKH, date, pttt, ghiChu FROM donhang 
                WHERE idKH = :customerId 
                ORDER BY date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':customerId' => $customerId]); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm trong đơn hàng
    public function getOrderDetails($orderId) {
        $sql = "SELECT ct.*, sp.ten, sp.image 
                FROM chitietdonhang ct 
                JOIN sanpham sp ON ct.idSP = sp.id 
                WHERE ct.id_hoaDon = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
