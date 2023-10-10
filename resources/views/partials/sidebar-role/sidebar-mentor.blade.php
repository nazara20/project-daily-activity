<li class="sidebar-item {{ request()->routeIs('mentor.dashboard') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.dashboard') }}">
        <i class="align-middle" data-feather="home"></i> <span
            class="align-middle">Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('mentor.mentee.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.mentee.index') }}">
        <i class="align-middle" data-feather="users"></i> <span
            class="align-middle">Mentee</span>
    </a>
</li>


<li class="sidebar-item {{ request()->routeIs('mentor.activity.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.activity.index') }}">
        <i class="align-middle" data-feather="activity"></i> <span
            class="align-middle">Activity</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('mentor.profile.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.profile.index') }}">
        <i class="align-middle" data-feather="settings"></i> <span
            class="align-middle">Profile</span>
    </a>
</li>
