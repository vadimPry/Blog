<!-- Sidebar -->
<div class="sidebar mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('personal.main.index') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.liked.index') }}" class="nav-link">
                <i class="nav-icon far fa-thumbs-up"></i>
                <p>
                    Liked
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.comment.index') }}" class="nav-link">
                <i class="nav-icon far fa-comment"></i>
                <p>
                    Comment
                </p>
            </a>
        </li>

    </ul>
</div>
<!-- /.Sidebar -->
