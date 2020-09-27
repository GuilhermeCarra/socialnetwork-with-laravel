<div class="menu">
    <ul>
        <li class="menu-item text-center" id="menu-btn"><i class="ri-menu-2-fill"></i></li>
        <li class="menu-item text-center" id="menu-newpost-btn"><i class="ri-menu-add-line"></i></li>
        <li class="menu-item text-center" id="menu-friends-btn"><i class="ri-team-line"></i></li>
        <li class="menu-item text-center"><a href="{{url(auth()->user()->username)}}"><img src="{{url(auth()->user()->avatar ?? asset('assets/img/ghost-line.svg'))}}" alt="avatar {{url(auth()->user()->username)}}" class="avatar"></a></li>
    </ul>
</div>