<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once './app/models/UserModel.php';

use GuzzleHttp\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController
{
    private $facebookAppId = '1632576790754984';
    private $facebookAppSecret = '238b83553e58ba1b9722042ea8462b34';
    private $facebookRedirectUri = 'http://localhost/DoAn-PHP/index.php?controller=login&action=facebook_callback';
    private $facebookGraphVersion = 'v18.0';

    private $googleClientId = '521834508101-6lqe0vekgcjb9t364ntumgfim1toc1gf.apps.googleusercontent.com';
    private $googleClientSecret = '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';
    private $googleRedirectUri = 'http://localhost/DoAn-PHP/index.php?controller=login&action=google_callback';

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new UserModel();
            $user = $model->getUser($username, $password);

            if ($user) {
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'role' => $user['role']
                ];
                header('Location: index.php?action=index');
                exit();
            } else {
                echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
            }
        }

        include './app/views/login.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=index');
        exit();
    }

    public function register()
    {
        require_once './app/models/UserModel.php';
        $model = new UserModel();

        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];

            $result = $model->registerUser($username, $password, $fullname, $email);

            if ($result['status']) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href='index.php?action=login';</script>";
                exit();
            } else {
                echo "<script>alert('" . $result['message'] . "'); window.location.href='index.php?action=register';</script>";
                exit();
            }
        }

        require_once './app/views/register.php';
    }

    public function login_facebook()
    {
        $state = bin2hex(random_bytes(16));
        $_SESSION['fb_state'] = $state;

        $loginUrl = "https://www.facebook.com/{$this->facebookGraphVersion}/dialog/oauth?" . http_build_query([
            'client_id' => $this->facebookAppId,
            'redirect_uri' => $this->facebookRedirectUri,
            'scope' => 'email',
            'state' => $state,
        ]);

        header("Location: " . $loginUrl);
        exit();
    }

    public function facebook_callback()
    {
        if (!isset($_GET['state']) || $_GET['state'] !== $_SESSION['fb_state']) {
            die('Lỗi: State không khớp. Có thể là tấn công CSRF.');
        }

        if (!isset($_GET['code'])) {
            die('Lỗi: Không lấy được mã code từ Facebook.');
        }

        $code = $_GET['code'];
        $httpClient = new Client();

        try {
            $response = $httpClient->request('GET', "https://graph.facebook.com/{$this->facebookGraphVersion}/oauth/access_token", [
                'query' => [
                    'client_id' => $this->facebookAppId,
                    'client_secret' => $this->facebookAppSecret,
                    'redirect_uri' => $this->facebookRedirectUri,
                    'code' => $code,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $accessToken = $data['access_token'] ?? null;

            if (!$accessToken) {
                die('Lỗi: Không lấy được Access Token.');
            }

            $response = $httpClient->request('GET', "https://graph.facebook.com/{$this->facebookGraphVersion}/me", [
                'query' => [
                    'fields' => 'id,name,email',
                    'access_token' => $accessToken,
                ],
            ]);

            $user = json_decode($response->getBody(), true);

            $_SESSION['user'] = [
                'username' => $user['email'] ?? 'fb_' . $user['id'],
                'fullname' => $user['name'] ?? 'Unknown',
                'role' => 'user'
            ];

            header("Location: index.php?action=index");
            exit();
        } catch (\Exception $e) {
            echo 'Lỗi đăng nhập Facebook: ' . $e->getMessage();
            exit();
        }
    }

    public function login_google()
    {
        $client = new \Google_Client();
        $client->setClientId($this->googleClientId);
        $client->setClientSecret($this->googleClientSecret);
        $client->setRedirectUri($this->googleRedirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        header('Location: ' . $authUrl);
        exit();
    }

    public function google_callback()
    {
        $client = new \Google_Client();
        $client->setClientId($this->googleClientId);
        $client->setClientSecret($this->googleClientSecret);
        $client->setRedirectUri($this->googleRedirectUri);

        if (!isset($_GET['code'])) {
            die('Lỗi: Không lấy được mã code từ Google.');
        }

        try {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (isset($token['error'])) {
                die('Lỗi lấy Access Token: ' . $token['error']);
            }

            $client->setAccessToken($token);

            $oauth = new \Google_Service_OAuth2($client);
            $userInfo = $oauth->userinfo->get();

            $_SESSION['user'] = [
                'username' => $userInfo->email,
                'fullname' => $userInfo->name,
                'role' => 'user'
            ];

            header('Location: index.php?action=index');
            exit();
        } catch (\Exception $e) {
            echo 'Lỗi đăng nhập Google: ' . $e->getMessage();
            exit();
        }
    }

    public function forgot_password()
    {
        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $user = $model->getUserByEmail($email);

            if ($user) {
                // Tạo mật khẩu mới
                $newPassword = bin2hex(random_bytes(4)); // 8 ký tự
                $model->updatePassword($email, $newPassword);

                // Gửi email bằng PHPMailer
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'quangdinh0106@gmail.com';
                    $mail->Password = 'uman maec txia livs';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('your_email@gmail.com', 'Quản trị viên');
                    $mail->addAddress($email, $user['fullname']);

                    $mail->isHTML(true);
                    $mail->Subject = 'Yêu cầu đặt lại mật khẩu';
                    $mail->Body    = "Xin chào <b>{$user['fullname']}</b>,<br><br>Mật khẩu mới của bạn là: <b>$newPassword</b><br>Vui lòng đăng nhập và đổi mật khẩu ngay.";

                    $mail->send();

                    echo "<script>alert('Mật khẩu mới đã được gửi đến email của bạn!'); window.location.href='index.php?action=login';</script>";
                } catch (Exception $e) {
                    echo "<script>alert('Không thể gửi email. Lỗi: {$mail->ErrorInfo}'); window.location.href='index.php?action=login';</script>";
                }
            } else {
                echo "<script>alert('Email không tồn tại trong hệ thống.'); window.location.href='index.php?controller=login&action=forgot_password';</script>";
            }
            exit();
        }

        include './app/views/forgot_password.php';
    }

    public function change_password()
    {
        require_once './app/models/UserModel.php';
        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];

            $user = $model->getUserByEmailAndPassword($email, $oldPassword);

            if ($user) {
                $model->updatePassword($email, $newPassword);
                echo "<script>alert('Đổi mật khẩu thành công!'); window.location.href='index.php?action=login';</script>";
            } else {
                echo "<script>alert('Email hoặc mật khẩu cũ không đúng!');</script>";
            }
        }

        include './app/views/change_password.php';
    }
}
