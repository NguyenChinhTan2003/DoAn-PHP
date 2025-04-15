<?php
class ContactController
{
    private $db;
    private $contact;

    public function __construct($db)
    {
        $this->db = $db;
        require_once __DIR__ . '/../models/Contact.php';
        $this->contact = new Contact($this->db);
    }

    public function index()
    {
        require_once __DIR__ . '/../views/contact.php';
    }

    public function submit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            if ($this->contact->create($name, $email, $subject, $message)) {
                // Chuyển hướng hoặc hiển thị thông báo thành công
                echo "<script>alert('Cảm ơn bạn đã liên hệ với chúng tôi!'); window.location.href = '?controller=contact&action=index';</script>";
                exit;
            } else {
                // Hiển thị thông báo lỗi
                echo "Có lỗi xảy ra, vui lòng thử lại.";
            }
        } else {
            // Nếu không phải POST request, chuyển hướng về trang liên hệ
            header("Location: ?controller=contact&action=index");
            exit;
        }
    }
}
?>