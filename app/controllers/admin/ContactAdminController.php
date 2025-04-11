<?php

class ContactAdminController {
    public function adminIndex() {
        $model = new ContactModel();
        $contacts = $model->getAllContacts();
        require_once __DIR__ . '/../../views/admin/contacts/index.php'; // View danh sách
    }

    public function adminView() {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            die('❌ Không tìm thấy ID liên hệ');
        }

        $model = new ContactModel();
        $contact = $model->getContactById($id);

        if (!$contact) {
            die('❌ Không tìm thấy liên hệ với ID: ' . $id);
        }

        require_once __DIR__ . '/../../views/admin/contacts/view.php'; // View chi tiết
    }

    public function adminDelete() {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            die('❌ Không tìm thấy ID liên hệ');
        }

        $model = new ContactModel();
        $model->deleteContact($id);

        header('Location: index.php?controller=contactAdmin&action=adminIndex'); // Quay lại trang danh sách
        exit();
    }

    public function adminCreate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý form submit
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $message = $_POST['message'] ?? '';

            $model = new ContactModel();
            $model->addContact($name, $email, $subject, $message);

            header('Location: index.php?controller=contactAdmin&action=adminIndex'); // Quay lại trang danh sách
            exit();
        } else {
            // Hiển thị form tạo
            require_once __DIR__ . '/../../views/admin/contacts/create.php'; // View tạo mới
        }
    }

    public function adminEdit() {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            die('❌ Không tìm thấy ID liên hệ');
        }

        $model = new ContactModel();
        $contact = $model->getContactById($id);

        if (!$contact) {
            die('❌ Không tìm thấy liên hệ với ID: ' . $id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý form submit
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $message = $_POST['message'] ?? '';

            $model->updateContact($id, $name, $email, $subject, $message);

            header('Location: index.php?controller=contactAdmin&action=adminIndex'); // Quay lại trang danh sách
            exit();
        } else {
            // Hiển thị form chỉnh sửa
            require_once __DIR__ . '/../../views/admin/contacts/edit.php'; // View chỉnh sửa
        }
    }
}

?>