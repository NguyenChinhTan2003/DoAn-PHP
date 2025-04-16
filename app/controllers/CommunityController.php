<?php
class CommunityController
{
    private $postModel;
    private $commentModel;

    public function __construct($database)
    {
        $this->postModel = new PostModel($database);
        $this->commentModel = new CommentModel($database);
    }

    public function index()
    {
        $postId = 1; // Thay đổi thành ID của bài viết thực tế
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL
        $comments = $this->commentModel->getComments($postId);
        $commentCount = $this->commentModel->countComments($postId); // Lấy số lượng bình luận
        $totalPages = ceil($commentCount / 5); // Tính tổng số trang
        require_once __DIR__ . '/../views/community.php';
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user']['user_id'])) {
                echo "Vui lòng đăng nhập để thêm bình luận.";
                return;
            }
            if (empty($_POST['content'])) {
                echo "Vui lòng cung cấp nội dung bình luận.";
                return;
            }
            if (empty($_POST['post_id'])) {
                echo "Không tìm thấy ID bài viết.";
                return;
            }

            // Thêm bình luận với user_id từ session
            $success = $this->commentModel->addComment(
                $_SESSION['user']['user_id'],
                $_POST['content'],
                $_POST['post_id']
            );

            if ($success) {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    $commentCount = $this->commentModel->countComments($_POST['post_id']);
                    header('Content-Type:application/json');
                    echo json_encode(['success' => true, 'commentCount' => $commentCount]);
                    exit;
                } else {
                    header("Location: ?controller=community&action=index");
                    exit;
                }
            } else {
                echo "Có lỗi xảy ra khi gửi bình luận.";
            }
        } else {
            echo "Phương thức không hợp lệ. Vui lòng sử dụng form để gửi bình luận.";
        }
    }

    public function getComments()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'] ?? 1;
            $page = $_POST['page'] ?? 1;
            $comments = $this->commentModel->getComments($postId, $page);
            $commentCount = $this->commentModel->countComments($postId);
            $totalPages = ceil($commentCount / 5);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'comments' => $comments,
                'commentCount' => $commentCount,
                'totalPages' => $totalPages,
                'currentPage' => (int)$page
            ]);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ']);
            exit;
        }
    }
}
