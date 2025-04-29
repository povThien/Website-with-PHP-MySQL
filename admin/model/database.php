<?php
// admin/model/database.php
class Database {
    public $conn;

    public function __construct() {
        $host = 'localhost';  // Tên máy chủ
        $dbname = 'sayhi_new_10_12';  // Tên cơ sở dữ liệu
        $username = 'root';  // Tên người dùng
        $password = '';  // Mật khẩu

        try {
            // Tạo kết nối PDO
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }
}
?>