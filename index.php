<?php
// index.php
session_start();

// Nạp autoloader từ composer (nếu có)
require_once __DIR__ . '/vendor/autoload.php';

// Nạp class Database để kết nối database
require_once __DIR__ . '/app/config/Database.php';

// Khởi tạo kết nối database
$database = new Database();
$db = $database->getConnection();

if ($db === null) {
    die("Failed to connect to the database.");
}

// Autoloader cho controllers và models
spl_autoload_register(function ($class_name) {
    $paths = [
        __DIR__ . "/app/controllers/" . $class_name . ".php",
        __DIR__ . "/app/models/" . $class_name . ".php"
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
    die("❌ Không tìm thấy file: " . $class_name);
});

// Xác định controller và action từ URL
$controllerName = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? 'index';

if (empty($controllerName)) {
    if (in_array($action, ['login', 'logout', 'register'])) {
        $controllerName = 'login';
    } else {
        $controllerName = 'home';
    }
}

$controllerClass = ucfirst($controllerName) . 'Controller';
$controllerFile = __DIR__ . "/app/controllers/" . $controllerClass . ".php";

if (file_exists($controllerFile)) {
    // Khởi tạo controller và truyền $db vào constructor
    $controller = new $controllerClass($db);

    if (method_exists($controller, $action)) {
        ob_start();
        $controller->$action();
        $content = ob_get_clean();

        // Chỉ áp dụng layout admin cho các controller thuộc admin
        $adminControllers = ['News', 'Dashboard', 'Category'];
        if (in_array(ucfirst($controllerName), $adminControllers)) {
            require_once __DIR__ . "/app/views/admin/layouts/main.php";
        } else {
            echo $content;
        }
    } else {
        http_response_code(404);
        die("❌ Action `$action` không tồn tại trong $controllerClass");
    }
} else {
    http_response_code(404);
    die("❌ Controller `$controllerClass` không tồn tại");
}
?>