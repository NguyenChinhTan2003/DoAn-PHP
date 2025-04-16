<?php
class Database
{
    private $host = "localhost";
    private $db_name = "game_news";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());  // Dừng và hiển thị thông báo lỗi nếu kết nối không thành công
        }
        return $this->conn;
    }
}