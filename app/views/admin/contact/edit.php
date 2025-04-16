<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin liên hệ</h6>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
            </div>
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="subject" class="form-control" value="<?php echo htmlspecialchars($contact['subject']); ?>" required>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="message" class="form-control" required><?php echo htmlspecialchars($contact['message']); ?></textarea>
            </div>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
            <a href="?controller=adminContact&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>