<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"><?php echo $category['description']; ?></textarea>
            </div>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
            <a href="?controller=category&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>