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
        // Lấy dữ liệu từ database (bỏ LIMIT để lấy tất cả bài đăng)
        $query = "SELECT * FROM news ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Debug: Kiểm tra số lượng bài đăng

        // Phần Recent Reviews đã bị bỏ trong view, nên không cần truy vấn này
        // $recentQuery = "SELECT * FROM news ORDER BY created_at DESC LIMIT 4";
        // $recentStmt = $this->db->prepare($recentQuery);
        // $recentStmt->execute();
        // $recentNews = $recentStmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/review.php';
    }
}