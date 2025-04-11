<button id="notification-btn" onclick="toggleCommentForm()">🔔 <span id="notification-count">0</span></button>

<!-- Danh sách thông báo -->
<div id="notification-list" style="display: none; position: absolute; background: white; border: 1px solid gray; padding: 10px; max-width: 300px;">
    <!-- Thông báo sẽ hiển thị ở đây -->
</div>

<!-- Form bình luận -->
<div id="commentForm">
    <form id="commentFormInner">
        <input type="hidden" name="post_id" id="commentPostId" value="1">
        <textarea name="content" placeholder="Viết bình luận..." required></textarea>
        <button type="submit">Gửi</button>
    </form>
</div>
<!-- JS xử lý -->
<script src="public/js/notifications.js"></script>

<script>
    // Hiện/ẩn form khi click vào biểu tượng thông báo
    document.getElementById('notification-btn').addEventListener('click', function() {
        toggleCommentForm();
    });
    // Hàm toggle form
    function toggleCommentForm() {
        const form = document.getElementById('commentForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    // Gửi bình luận bằng AJAX
    document.getElementById('commentFormInner').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('index.php?controller=community&action=addComment', {
                method: 'POST',
                body: formData,
            })
            .then(res => res.text())
            .then(data => {
                alert('✅ Đã gửi bình luận!');
                document.getElementById('commentForm').style.display = 'none';
                this.reset(); // Xoá nội dung sau khi gửi
            })
            .catch(err => {
                alert('❌ Có lỗi xảy ra');
                console.error(err);
            });
    });
</script>