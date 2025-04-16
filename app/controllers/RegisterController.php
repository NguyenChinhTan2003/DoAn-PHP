<?php
require_once './app/models/UserModel.php';

class RegisterController
{
    public function showRegisterForm()
    {
        include './app/views/register.php';
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $role = isset($_POST['role']) ? $_POST['role'] : 'user'; // Mặc định role là 'user' nếu không chọn
        
            // Kiểm tra dữ liệu nhập vào
            if (empty($username) || empty($password) || empty($fullname) || empty($email)) {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');window.location='index.php?action=register';</script>";
                exit();
            }

            // Kiểm tra định dạng email hợp lệ
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Email không hợp lệ!');window.location='index.php?action=register';</script>";
                exit();
            }

            $model = new UserModel();
            $result = $model->registerUser($username, $password, $fullname, $email, $role);
            
            if ($result['status']) {
                echo "<script>alert('{$result['message']}');window.location='index.php?action=login';</script>";
            } else {
                echo "<script>alert('{$result['message']}');window.location='index.php?action=register';</script>";
            }
        }        
    }
}
?>