<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa bài viết</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control" required><?php echo $row['content']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo $row['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại</label><br>
                <?php if ($row['image']): ?>
                    <img src="<?php echo $row['image']; ?>" width="100">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Hình ảnh mới</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
            <a href="?controller=news&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>