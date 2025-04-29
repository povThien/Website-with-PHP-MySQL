<?php
require_once('./frontend/model/database.php');
class userModel {
    public function getUser($data) {
        $sql = "SELECT * FROM khachhang WHERE email=:email AND pass=:pass";
        $params = [
            ':email' => $data['email'],
            ':pass' => $data['pass']
        ];
        
        // echo "SQL: " . $sql . "<br>";
        // echo "Params: " . print_r($params, true) . "<br>";

        return Database::getInstance()->getOne($sql, $params);
    }

    public function addUser($data) {
        $sql = "INSERT INTO khachhang (username, email, pass, hoten, diachi, sdt) VALUES (:username, :email, :pass, :hoten, :diachi, :sdt)";
        $params = [
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':pass' => $data['pass'],
            ':hoten' => $data['hoten'],
            ':diachi' => $data['diachi'],
            ':sdt' => $data['sdt']
        ];
        return Database::getInstance()->execute($sql, $params);
    }
}
?>
