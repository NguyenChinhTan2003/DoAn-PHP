<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Liên hệ</h6>
    </div>
    <div class="card-body">
        <a href="?controller=ContactAdmin&action=adminCreate" class="btn btn-primary mb-3">Thêm liên hệ</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($contacts)): ?>
                        <tr>
                            <td colspan="6">Không có liên hệ nào.</td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo $contact['id']; ?></td>
                            <td><?php echo htmlspecialchars($contact['name']); ?></td>
                            <td><?php echo htmlspecialchars($contact['email']); ?></td>
                            <td><?php echo htmlspecialchars($contact['subject']); ?></td>
                            <td><?php echo $contact['created_at']; ?></td>
                            <td>
                                <a href="?controller=ContactAdmin&action=adminView&id=<?php echo $contact['id']; ?>" class="btn btn-info btn-sm">Xem</a>
                                <a href="?controller=ContactAdmin&action=adminEdit&id=<?php echo $contact['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                                <a href="?controller=ContactAdmin&action=adminDelete&id=<?php echo $contact['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>