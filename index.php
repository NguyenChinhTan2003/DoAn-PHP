<?php
// Tự động load tất cả các controller khi cần
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . "/app/controllers/" . $class_name . ".php";
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Không tìm thấy file: " . $file);
    }
});

// Lấy controller và action từ URL, mặc định là 'home' và 'index'
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Xử lý gọi controller phù hợp
$controllerClass = ucfirst($controllerName) . "Controller"; // Chuyển thành HomeController, ReviewController...
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        die("Action không hợp lệ!");
    }
} else {
    die("Controller không hợp lệ!");
}
?>