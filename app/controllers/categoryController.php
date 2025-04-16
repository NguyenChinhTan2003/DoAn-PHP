<?php
class CategoryController {
    private $db;
    private $category;

    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();
        require_once __DIR__ . '/../models/categoryModel.php';
        $this->category = new Category($this->db);
    }

    public function index() {
        $categories = $this->category->getAll();
        require_once __DIR__ . '/../views/admin/category/index.php';
    }

    public function create() {
        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            if ($this->category->create($name, $description)) {
                header("Location: ?controller=category&action=index");
                exit;
            }
        }
        require_once __DIR__ . '/../views/admin/category/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            if ($this->category->update($id, $name, $description)) {
                header("Location: ?controller=category&action=index");
                exit;
            }
        }
        $category = $this->category->getById($id);
        require_once __DIR__ . '/../views/admin/category/edit.php';
    }

    public function delete() {
        $id = $_GET['id'];
        if ($this->category->delete($id)) {
            header("Location: ?controller=category&action=index");
            exit;
        }
    }
}
?>