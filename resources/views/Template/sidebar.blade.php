<nav class="sidebar" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('index.home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('index.category')}}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.index.product')}}">Book List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('index.user')}}">Data User</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ asset('pages/ui-features/typography.html') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>