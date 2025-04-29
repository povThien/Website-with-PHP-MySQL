<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "sayhi_new_10_12";
    private $conn;
    public static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    

    public function __construct() {
        try {
            // Tạo kết nối đến database theo phương thức PDO
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Thêm thông báo lỗi chi tiết và dừng chương trình
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    // Phương thức bắt đầu giao dịch
    public function beginTransaction() {
        if ($this->conn) {
            return $this->conn->beginTransaction();
        }
        return false;
    }
    

    // Phương thức commit giao dịch
    public function commit() {
        return $this->conn->commit();
    }

    // Phương thức rollback giao dịch
    public function rollBack() {
        return $this->conn->rollBack();
    }

    // Phương thức prepare 
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    // Dùng cho câu lệnh SQL dạng INSERT, UPDATE hoặc DELETE
    public function execute($sql, $params = []) {
        try {
            $stmt = $this->prepare($sql);
            $result = $stmt->execute($params);
            if (!$result) {
                throw new Exception("Error executing query: " . $stmt->errorInfo());
            }
            return $result;
        } catch (PDOException $e) {
            echo "SQL error: " . $e->getMessage();
            return false;
        }
    }
    

    // Phương thức executeOne cho các lệnh đơn giản
    public function executeOne($query, $params = []) {
        try {
            $stmt = $this->prepare($query);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            echo "SQL error: " . $e->getMessage();
            return false;
        }
    }

    // Dùng cho câu lệnh SELECT, trả về tất cả các kết quả
    public function getAll($sql, $params = []) {
        try {
            $stmt = $this->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "SQL error: " . $e->getMessage();
            return [];
        }
    }

    // Dùng cho câu lệnh SELECT, trả về một kết quả
    public function getOne($sql, $params = []) {
        try {
            $stmt = $this->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result === false) {
                return null;  // Không tìm thấy kết quả
            }
            return $result;
        } catch (PDOException $e) {
            echo "SQL error: " . $e->getMessage();
            return null;
        }
    }
    public function lastInsertId() {
        try {
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Lỗi khi lấy ID cuối cùng: " . $e->getMessage();
            return null;
        }
    }
}
?>
