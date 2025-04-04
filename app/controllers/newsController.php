<?php
class NewsController {
    private $db;
    private $news;
    private $category;

    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();
        require_once __DIR__ . '/../models/newsModel.php';
        require_once __DIR__ . '/../models/categoryModel.php';
        $this->news = new News($this->db);
        $this->category = new Category($this->db);
    }

    public function index() {
        $stmt = $this->news->read();
        require_once __DIR__ . '/../views/admin/news/index.php';
    }

    public function create() {
        if ($_POST) {
            $this->news->title = $_POST['title'];
            $this->news->content = $_POST['content'];
            $this->news->category_id = $_POST['category_id'];
            if (isset($_FILES['image']) && $_FILES['image']['name']) {
                $target_dir = "public/uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $this->news->image = $target_file;
            }
            if ($this->news->create()) {
                header("Location: ?controller=news&action=index");
                exit;
            }
        }
        $categories = $this->category->getAll(); // Lấy danh sách danh mục
        require_once __DIR__ . '/../views/admin/news/create.php';
    }

    public function edit() {
        $this->news->id = $_GET['id'];
        if ($_POST) {
            $this->news->title = $_POST['title'];
            $this->news->content = $_POST['content'];
            $this->news->category_id = $_POST['category_id'];
            if (isset($_FILES['image']) && $_FILES['image']['name']) {
                $target_dir = "public/uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $this->news->image = $target_file;
            } else {
                $stmt = $this->news->read_single();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->news->image = $row['image'];
            }
            if ($this->news->update()) {
                header("Location: ?controller=news&action=index");
                exit;
            }
        }
        $stmt = $this->news->read_single();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $categories = $this->category->getAll(); // Lấy danh sách danh mục
        require_once __DIR__ . '/../views/admin/news/edit.php';
    }

    public function delete() {
        $this->news->id = $_GET['id'];
        if ($this->news->delete()) {
            header("Location: ?controller=news&action=index");
            exit;
        }
    }
}
?>