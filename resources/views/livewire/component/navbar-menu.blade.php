<div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav">

                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($menu['url']) }}" role="button">
                            <i class="{{ $menu['icon'] }} me-2"></i><span key="t-dashboards">{{ $menu['name'] }}</span>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </nav>
</div>
