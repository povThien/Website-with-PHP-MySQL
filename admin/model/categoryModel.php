<?php
require_once './admin/model/database.php';

class CategoryModel {
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

    public function getCategoryById($id) {
        $sql = "SELECT * FROM danhmuc WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($name) {
        $sql = "INSERT INTO danhmuc (ten) VALUES (:ten)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':ten', $name, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateCategory($id, $name) {
        $sql = "UPDATE danhmuc SET ten = :ten WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':ten', $name, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM danhmuc WHERE id = :id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
