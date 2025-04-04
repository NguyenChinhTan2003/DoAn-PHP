<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách tin tức</h6>
    </div>
    <div class="card-body">
        <a href="?controller=news&action=create" class="btn btn-primary mb-3">Thêm tin tức</a>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Ảnh</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td>
                            <?php if ($row['image']): ?>
                                <img src="<?php echo $row['image']; ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>
                        <td>
                            <a href="?controller=news&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="?controller=news&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Xóa</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>