<?php

class ContactController {

    public function index() {
        require_once __DIR__ . '/../views/contact.php'; // View liên hệ
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $message = $_POST['message'] ?? '';

            $model = new ContactModel();
            $model->addContact($name, $email, $subject, $message);

            // Chuyển hướng hoặc hiển thị thông báo thành công
            header('Location: index.php?controller=contact&action=success');
            exit();
        } else {
            // Nếu không phải POST request, chuyển hướng hoặc hiển thị lỗi
            header('Location: index.php?controller=contact'); // Quay lại trang liên hệ
            exit();
        }
    }

    public function success() {
        // Hiển thị view thông báo gửi liên hệ thành công (tạo file success.php trong views/contact/)
        echo "<h1>Liên hệ của bạn đã được gửi thành công!</h1>"; //Đơn giản hóa
    }
}
?>