<?php
// app/controllers/SingleBlogController.php
class SingleBlogController {
    private $newsModel;

    public function __construct($db) {
        // Sửa đường dẫn để trỏ đúng đến file newsModel.php
        require_once __DIR__ . '/../models/newsModel.php';
        $this->newsModel = new News($db);
    }

    public function index() {
        // Kiểm tra xem ID bài viết có được cung cấp hay không
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $error = "Không tìm thấy ID bài viết!";
            return;
        }

        // Gán ID cho model
        $this->newsModel->id = $_GET['id'];

        // Tăng số lượt xem
        $this->newsModel->incrementViews();

        // Lấy thông tin bài viết
        $stmt = $this->newsModel->read_single();
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem bài viết có tồn tại hay không
        if (!$blog) {
            $error = "Bài viết không tồn tại!";
            return;
        }

        // Hiển thị view
        require_once 'app/views/single-blog.php';
    }
}
?>