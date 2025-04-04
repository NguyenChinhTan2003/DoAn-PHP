<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm bài viết mới</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="?controller=news&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>