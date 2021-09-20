<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar">
        <ul class="navbar-nav theme-brand flex-row">
            <li class="nav-item theme-logo">
                <a href="{{url('home')}}">
                    <img src="{{ asset('logo.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>
        <ul class="menu-categories">
            @include('layouts._menu')
        </ul>
    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar">

    
        <div class="submenu" id="dashboard">
            <ul class="submenu-list" data-parent-element="#dashboard">
                <li class="active">
                    <a href="{{ url('home') }}"> Analytics </a>
                </li>
                <li>
                    <a href="{{ url('home') }}"> Sales </a>
                </li>
            </ul>
        </div>

    </div>

</div>
