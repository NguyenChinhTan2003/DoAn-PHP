<?php
class PostModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }
    // Lấy tất cả bài viết
    public function getAllPosts()
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy bài viết theo id
    public function getPostById($postId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm bài viết mới
    public function addPost($userId, $title, $content)
    {
        $stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $title, $content]);
    }
}
