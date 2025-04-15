<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm liên hệ mới</h6>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="?controller=adminContact&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>