<?php
require_once 'models/NotificationModel.php';

class NotificationController {
    private $model;

    public function __construct($database) {
        $this->model = new NotificationModel($database);
    }

    // API: Lấy danh sách thông báo chưa đọc
    public function fetchNotifications() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo json_encode([]); // Trả về mảng rỗng nếu không có người dùng đăng nhập
            exit;
        }

        // Lấy thông báo chưa đọc từ database
        $notifications = $this->model->getUnreadNotifications($_SESSION['user_id']);
        echo json_encode($notifications); // Trả về dữ liệu dưới dạng JSON
    }

    public function markAsRead() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            exit;
        }

        // Đánh dấu tất cả thông báo là đã đọc
        $this->model->markAsRead($_SESSION['user_id']);
        echo json_encode(['status' => 'success']); // Trả về phản hồi success
    }
}
?>