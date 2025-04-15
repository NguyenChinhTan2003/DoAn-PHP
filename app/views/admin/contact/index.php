<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách liên hệ</h6>
    </div>
    <div class="card-body">
        <a href="?controller=adminContact&action=create" class="btn btn-primary mb-3">Thêm liên hệ</a> <!-- Thêm nút -->
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày gửi</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo $contact['id']; ?></td>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['subject']; ?></td>
                            <td><?php echo $contact['message']; ?></td>
                            <td><?php echo $contact['created_at']; ?></td>
                            <td>
                                <a href="?controller=adminContact&action=edit&id=<?php echo $contact['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="?controller=adminContact&action=delete&id=<?php echo $contact['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>