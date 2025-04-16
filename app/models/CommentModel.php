<?php
class CommentModel
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
        if (!$this->conn) {
            die("Không thể kết nối đến database trong CommentModel!");
        }
    }

    public function addComment($userId, $content, $postId)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO comments (user_id, content, post_id) VALUES (?, ?, ?)");
            $success = $stmt->execute([$userId, $content, $postId]);
            if ($success) {
                $this->sendCommentNotification($userId, $postId);
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Lỗi khi thêm bình luận: " . $e->getMessage();
            return false;
        }
    }

    private function sendCommentNotification($userId, $postId)
    {
        try {
            $stmt = $this->conn->prepare("SELECT user_id FROM posts WHERE id = ?");
            $stmt->execute([$postId]);
            $postOwner = $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];

            if ($userId != $postOwner) {
                $message = "Có một bình luận mới từ người dùng #" . $userId;
                $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
                $stmt->execute([$postOwner, $message]);
            }
        } catch (PDOException $e) {
            echo "Lỗi khi gửi thông báo: " . $e->getMessage();
        }
    }
    public function getComments($postId, $page = 1, $limit = 5)
    {
        $offset = ($page - 1) * $limit;
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?");
        // Ép kiểu $limit và $offset thành integer
        $stmt->bindParam(1, $postId, PDO::PARAM_INT);
        $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        $stmt->bindParam(3, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Thêm hàm mới để đếm số bình luận
    public function countComments($postId)
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM comments WHERE post_id = ?");
            $stmt->execute([$postId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            echo "Lỗi khi đếm bình luận: " . $e->getMessage();
            return 0; // Trả về 0 nếu có lỗi
        }
    }
}
