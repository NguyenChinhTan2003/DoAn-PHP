<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

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
    require_once $controllerFile;
    $controller = new $controllerClass();

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