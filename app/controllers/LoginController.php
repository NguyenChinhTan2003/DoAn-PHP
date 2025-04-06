<?php
// Bao gồm autoload
require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;

class LoginController
{
    private $facebookAppId = '1632576790754984'; // Thay bằng App ID của bạn
    private $facebookAppSecret = '238b83553e58ba1b9722042ea8462b34'; // Thay bằng App Secret của bạn
    private $facebookRedirectUri = 'http://localhost/DoAn-PHP/index.php?controller=login&action=facebook_callback';
    private $facebookGraphVersion = 'v18.0'; // Phiên bản mới nhất tính đến 2025

    private $googleClientId = '521834508101-6lqe0vekgcjb9t364ntumgfim1toc1gf.apps.googleusercontent.com'; // Thay bằng Client ID của bạn
    private $googleClientSecret = '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'; // Thay bằng Client Secret của bạn
    private $googleRedirectUri = 'http://localhost/DoAn-PHP/index.php?controller=login&action=google_callback';
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new UserModel();
            $user = $model->getUser($username, $password);

            if ($user) {
                // Lưu thông tin user vào session
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'role' => $user['role']
                ];

                // Chuyển hướng
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
        // Tạo URL đăng nhập của Facebook
        $state = bin2hex(random_bytes(16)); // Tạo state để bảo mật CSRF
        $_SESSION['fb_state'] = $state;

        $loginUrl = "https://www.facebook.com/{$this->facebookGraphVersion}/dialog/oauth?" . http_build_query([
            'client_id' => $this->facebookAppId,
            'redirect_uri' => $this->facebookRedirectUri,
            'scope' => 'email', // Quyền cần lấy
            'state' => $state,
        ]);

        header("Location: " . $loginUrl);
        exit();
    }

    public function facebook_callback()
    {
        // Kiểm tra state để bảo mật CSRF
        if (!isset($_GET['state']) || $_GET['state'] !== $_SESSION['fb_state']) {
            die('Lỗi: State không khớp. Có thể là tấn công CSRF.');
        }

        // Lấy code từ query string
        if (!isset($_GET['code'])) {
            die('Lỗi: Không lấy được mã code từ Facebook.');
        }

        $code = $_GET['code'];

        // Khởi tạo Guzzle client
        $httpClient = new Client();

        try {
            // Lấy access token
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

            // Lấy thông tin người dùng
            $response = $httpClient->request('GET', "https://graph.facebook.com/{$this->facebookGraphVersion}/me", [
                'query' => [
                    'fields' => 'id,name,email',
                    'access_token' => $accessToken,
                ],
            ]);

            $user = json_decode($response->getBody(), true);

            // Lưu thông tin người dùng vào session
            $_SESSION['user'] = [
                'username' => $user['email'] ?? 'fb_' . $user['id'], // Nếu không có email, dùng ID
                'fullname' => $user['name'] ?? 'Unknown',
                'role' => 'user'
            ];

            header("Location: index.php?action=index");
            exit();
        } catch (\Exception $e) {
            echo 'Lỗi đăng nhập Facebook: ' . $e->getMessage();
            exit();
        }

        if (empty($controllerName)) {
            if (in_array($action, ['login', 'logout', 'register', 'facebook_callback'])) {
                $controllerName = 'login';
            } else {
                $controllerName = 'home'; // Mặc định là home nếu không khớp
            }
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

            // Lưu thông tin người dùng vào session
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

        if (empty($controllerName)) {
            if (in_array($action, ['login', 'logout', 'register', 'facebook_callback', 'google_callback'])) {
                $controllerName = 'login';
            } else {
                $controllerName = 'home'; // Mặc định là home nếu không khớp
            }
        }
    }
}
