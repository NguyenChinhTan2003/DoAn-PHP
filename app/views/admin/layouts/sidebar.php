<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?controller=home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item <?php echo $controllerName === 'dashboad' ? 'active' : ''; ?>">
        <a class="nav-link" href="?controller=dashboad">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Quản lý nội dung</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý</span>
        </a>
        <div id="collapseTwo" class="collapse <?php echo in_array($controllerName, ['news', 'category']) ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tạo bài viết</h6>
                <a class="collapse-item <?php echo $controllerName === 'category' ? 'active' : ''; ?>" href="?controller=category&action=index">Danh mục</a>
                <a class="collapse-item <?php echo $controllerName === 'news' && $action === 'index' ? 'active' : ''; ?>" href="?controller=news&action=index">Bài viết</a>
                <a class="collapse-item <?php echo $controllerName === 'news' && $action === 'create' ? 'active' : ''; ?>" href="?controller=news&action=create">Thêm bài viết</a>
            </div>
        </div>
    </li>
<li class="nav-item <?php echo $controllerName === 'adminContact' ? 'active' : ''; ?>">
    <a class="nav-link" href="?controller=adminContact&action=index">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Quản lý liên hệ</span></a>
</li>

    <hr class="sidebar-divider">
</ul>