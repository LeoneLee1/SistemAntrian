<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin') }}">Queue</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin') }}">Qe</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fa fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>
            <li
                class="
            {{ request()->is('tujuan') ? 'active' : '' }}
            {{ request()->is('tujuan/create') ? 'active' : '' }}
            {{ request()->is('tujuan/show*') ? 'active' : '' }}
            {{ request()->is('tujuan/edit*') ? 'active' : '' }}
                ">
                <a class="nav-link" href="{{ route('tujuan') }}">
                    <i class="fa fa-bullseye"></i> <span>Tujuan Antrian</span>
                </a>
            </li>
            <li class="{{ request()->is('antrian') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('antrian') }}">
                    <i class="fa fa-tasks"></i> <span>Antrian</span>
                </a>
            </li>
            <li
                class="
            {{ request()->is('user') ? 'active' : '' }}
            {{ request()->is('user/create') ? 'active' : '' }}
            {{ request()->is('user/show*') ? 'active' : '' }}
            {{ request()->is('user/edit*') ? 'active' : '' }}
                ">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fa fa-users"></i> <span>Management User</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
