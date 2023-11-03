<li class="sidebar-item {{ request()->routeIs('mentee.dashboard') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentee.dashboard') }}">
        <i class="align-middle" data-feather="home"></i> <span
            class="align-middle">Dashboard</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('mentee.activity.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentee.activity.index') }}">
        <i class="align-middle" data-feather="activity"></i> <span
            class="align-middle">Aktifitas</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('mentee.profile.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentee.profile.index') }}">
        <i class="align-middle" data-feather="settings"></i> <span
            class="align-middle">Profile</span>
    </a>
</li>
