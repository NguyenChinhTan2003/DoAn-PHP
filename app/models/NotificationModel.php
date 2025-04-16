<?php
class NotificationModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection(); // Đảm bảo $database được truyền vào khi tạo đối tượng NotificationModel
    }

    // Thêm thông báo mới
    public function addNotification($userId, $message)
    {
        $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        return $stmt->execute([$userId, $message]);
    }

    // Lấy danh sách thông báo chưa đọc
    public function getUnreadNotifications($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notifications WHERE user_id = ? AND is_read = FALSE ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đánh dấu tất cả thông báo là đã đọc
    public function markAsRead($userId)
    {
        $stmt = $this->conn->prepare("UPDATE notifications SET is_read = TRUE WHERE user_id = ?");
        return $stmt->execute([$userId]);
    }
}
