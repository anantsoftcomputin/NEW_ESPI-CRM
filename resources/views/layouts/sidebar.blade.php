<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar">
        <ul class="navbar-nav theme-brand flex-row">
            <li class="nav-item theme-logo">
                <a href="index.html">
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
                    <a href="index.html"> Analytics </a>
                </li>
                <li>
                    <a href="index2.html"> Sales </a>
                </li>
            </ul>
        </div>

    </div>

</div>
