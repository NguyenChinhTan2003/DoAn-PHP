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

    // Thử tìm trong thư mục admin nếu không tìm thấy
    $adminPath = __DIR__ . "/app/controllers/admin/" . $class_name . ".php";
    if (file_exists($adminPath)) {
        require_once $adminPath;
        return;
    }

    die("❌ Không tìm thấy file: " . $class_name);
});

$controllerName = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerClass = ucfirst($controllerName) . 'Controller';

// Mảng các đường dẫn tiềm năng cho controller
$controllerPaths = [
    __DIR__ . "/app/controllers/" . $controllerClass . ".php",
    __DIR__ . "/app/controllers/admin/" . $controllerClass . ".php"
];

$controllerFound = false; // Biến cờ để kiểm tra xem controller đã được tìm thấy chưa

foreach ($controllerPaths as $controllerFile) {
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerClass();
        $controllerFound = true;
        break; // Thoát khỏi vòng lặp nếu tìm thấy controller
    }
}

if (!$controllerFound) {
    http_response_code(404);
    die("❌ Controller `$controllerClass` không tồn tại");
}


if (method_exists($controller, $action)) {
    ob_start();
    $controller->$action();
    $content = ob_get_clean();

    // Sử dụng một mảng để xác định các controller admin
    $adminControllers = ['News', 'Dashboard', 'Category', 'ContactAdmin'];
    if (in_array(ucfirst($controllerName), $adminControllers)) {
        require_once __DIR__ . "/app/views/admin/layouts/main.php";
        echo $content; // Hiển thị nội dung trong layout admin
    } else {
        echo $content;
    }
} else {
    http_response_code(404);
    die("❌ Action `$action` không tồn tại trong $controllerClass");
}
?>