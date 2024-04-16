<!-- Brand Logo -->
<a href="{{ route('post.index') }}" class="brand-link" target="_blank">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Blog page</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.main.index') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="nav-icon far fa-clipboard"></i>
                <p>
                    Posts
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Categories
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Tags
                </p>
            </a>
        </li>
    </ul>
</div>
<!-- /.Sidebar -->
