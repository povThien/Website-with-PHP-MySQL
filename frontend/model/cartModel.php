<?php

require_once('./frontend/model/database.php');

class CartModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    // Lưu thông tin đơn hàng
    public function saveOrder($userId, $name, $phone, $email, $address, $paymentMethod, $note) {
        try {
            $stmt = $this->db->prepare("INSERT INTO donhang (idKH, ten, phone, ghiChu, pttt, diaChi, date)
                                        VALUES (:userId, :name, :phone, :note, :paymentMethod, :address, NOW())");
            $stmt->execute([
                ':userId' => $userId,
                ':name' => $name,
                ':phone' => $phone,
                ':note' => $note,
                ':paymentMethod' => $paymentMethod,
                ':address' => $address,
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi khi lưu đơn hàng: " . $e->getMessage();
            return false;
        }
    }
    

    // Lưu chi tiết đơn hàng vào chitietdonhang
    public function saveOrderDetails($orderId, $cart) {
        $sql = "INSERT INTO chitietdonhang (id_hoaDon, idSP, soluong, dongia) 
                VALUES (:orderId, :idSP, :quantity, :price)";
        
        foreach ($cart as $key => $product) {
            $params = [
                ':orderId' => $orderId,
                ':idSP' => $key,
                ':quantity' => $product['quantity'],
                ':price' => $product['giakhuyenmai']
            ];

            $stmt = $this->db->prepare($sql);
            if (!$stmt) {
                return false; // Không thể chuẩn bị câu lệnh
            }

            if (!$stmt->execute($params)) {
                return false; // Lỗi khi thực thi câu lệnh
            }
        }

        return true; // Thành công
    }
}
?>
