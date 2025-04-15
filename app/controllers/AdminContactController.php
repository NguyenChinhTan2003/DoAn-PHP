<?php
class AdminContactController
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
        $contacts = $this->contact->getAll();
        require_once __DIR__ . '/../../app/views/admin/contact/index.php'; // Đã sửa
    }

    public function create()
    {
        if ($_POST) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            if ($this->contact->create($name, $email, $subject, $message)) {
                header("Location: ?controller=adminContact&action=index");
                exit;
            } else {
                echo "Có lỗi xảy ra, vui lòng thử lại.";
            }
        }
        require_once __DIR__ . '/../../app/views/admin/contact/create.php'; // Đã sửa
    }

    public function edit()
    {
        $id = $_GET['id'];
        if ($_POST) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            if ($this->contact->update($id, $name, $email, $subject, $message)) {
                header("Location: ?controller=adminContact&action=index");
                exit;
            }
        }
        $contact = $this->contact->getById($id);
        require_once __DIR__ . '/../../app/views/admin/contact/edit.php'; // Đã sửa
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($this->contact->delete($id)) {
            header("Location: ?controller=adminContact&action=index");
            exit;
        }
    }
}
?>