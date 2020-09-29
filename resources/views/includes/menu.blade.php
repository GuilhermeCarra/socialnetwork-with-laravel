<div class="menu" id="menu">
    <ul>
        <li class="menu-item text-center shadow" id="menu-btn"><i class="ri-menu-2-fill"></i></li>
        <li class="menu-item text-center shadow" id="menu-newpost-btn"><i class="ri-menu-add-line"></i></li>
        <li class="menu-item text-center shadow" id="menu-friends-btn"><i class="ri-team-line"></i></li>
        <li class="menu-item text-center shadow"><a class="navbar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="ri-logout-box-r-line"></i>
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>