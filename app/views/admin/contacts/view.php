<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi tiết Liên hệ</h6>
    </div>
    <div class="card-body">
        <dl>
            <dt>Tên:</dt>
            <dd><?php echo htmlspecialchars($contact['name']); ?></dd>

            <dt>Email:</dt>
            <dd><?php echo htmlspecialchars($contact['email']); ?></dd>

            <dt>Tiêu đề:</dt>
            <dd><?php echo htmlspecialchars($contact['subject']); ?></dd>

            <dt>Nội dung:</dt>
            <dd><?php echo htmlspecialchars($contact['message']); ?></dd>

            <dt>Ngày tạo:</dt>
            <dd><?php echo $contact['created_at']; ?></dd>
        </dl>
        <a href="?controller=ContactAdmin&action=adminIndex" class="btn btn-secondary">Quay lại</a>
    </div>
</div>