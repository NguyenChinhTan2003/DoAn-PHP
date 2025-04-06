<?php
class LoginController
{
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
        $fb = new \Facebook\Facebook([
            'app_id' => 'YOUR_FACEBOOK_APP_ID',
            'app_secret' => 'YOUR_FACEBOOK_APP_SECRET',
            'default_graph_version' => 'v12.0',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // Các quyền cần lấy
        $loginUrl = $helper->getLoginUrl('http://localhost/DoAn-PHP/index.php?action=facebook_callback', $permissions);

        header("Location: " . $loginUrl);
        exit();
    }

    public function facebook_callback()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => 'YOUR_FACEBOOK_APP_ID',
            'app_secret' => 'YOUR_FACEBOOK_APP_SECRET',
            'default_graph_version' => 'v12.0',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
            if (!isset($accessToken)) {
                die('Không lấy được Access Token!');
            }

            $response = $fb->get('/me?fields=id,name,email', $accessToken);
            $user = $response->getGraphUser();

            $_SESSION['user'] = [
                'username' => $user['email'],
                'fullname' => $user['name'],
                'role' => 'user'
            ];

            header("Location: index.php?action=index");
            exit();
        } catch (Exception $e) {
            echo 'Lỗi đăng nhập Facebook: ' . $e->getMessage();
        }
    }

    public function login_google()
    {
        $client = new \Google_Client();
        $client->setClientId('YOUR_GOOGLE_CLIENT_ID');
        $client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
        $client->setRedirectUri('http://localhost/DoAn-PHP/index.php?action=google_callback');
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        header('Location: ' . $authUrl);
        exit();
    }

    public function google_callback()
    {
        $client = new \Google_Client();
        $client->setClientId('YOUR_GOOGLE_CLIENT_ID');
        $client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
        $client->setRedirectUri('http://localhost/DoAn-PHP/index.php?action=google_callback');

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);

            $oauth = new \Google_Service_Oauth2($client);
            $userInfo = $oauth->userinfo->get();

            $_SESSION['user'] = [
                'username' => $userInfo->email,
                'fullname' => $userInfo->name,
                'role' => 'user'
            ];

            header('Location: index.php?action=index');
            exit();
        }
    }
}
