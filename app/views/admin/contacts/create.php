<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm Liên hệ</h6>
    </div>
    <div class="card-body">
        <form action="?controller=ContactAdmin&action=adminCreate" method="POST">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Tiêu đề:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Nội dung:</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="?controller=ContactAdmin&action=adminIndex" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>