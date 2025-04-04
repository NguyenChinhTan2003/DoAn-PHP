<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục mới</h6>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="?controller=category&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>