<?php
session_start(); // Bắt đầu session

// Tự động load tất cả các controller và models khi cần
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

// Lấy `controller` và `action` từ URL
$controllerName = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? 'index';

// Nếu không có controller nhưng có action = login, register, logout => Chỉ định đúng controller
if (empty($controllerName)) {
    if (in_array($action, ['login', 'logout', 'register'])) {
        $controllerName = 'login';
    } else {
        $controllerName = 'home'; // Mặc định là home nếu không khớp
    }
}

// Chuyển đổi tên controller thành chuẩn `HomeController`
$controllerClass = ucfirst($controllerName) . 'Controller';
$controllerFile = __DIR__ . "/app/controllers/" . $controllerClass . ".php";

// Kiểm tra file controller có tồn tại không
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerClass();

    // Kiểm tra phương thức (action) có tồn tại trong controller không
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        http_response_code(404);
        die("❌ Action `$action` không tồn tại trong $controllerClass");
    }
} else {
    http_response_code(404);
    die("❌ Controller `$controllerClass` không tồn tại");
}
?>