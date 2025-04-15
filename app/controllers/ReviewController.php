<?php
class ReviewController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        // Lấy dữ liệu từ database
        $query = "SELECT * FROM news ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/review.php';
    }
}