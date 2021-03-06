<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar">
        <ul class="navbar-nav theme-brand flex-row">
            <li class="nav-item theme-logo">
                <a href="{{url('home')}}">
                    <img src="{{ asset('logo.svg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>
        <ul class="menu-categories">
            @include('layouts._menu')
        </ul>
    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar">
        @canany(['view-application_status','view-assets'])
        <div class="submenu" id="more">
            <ul class="submenu-list" data-parent-element="#more">
                @can(["view-application_status"])
                <li>
                    <a href="{{ route('ApplicationStatus.index') }}">Application Status </a>
                </li>
                @endcan
                @can(["view-assets"])
                <li>
                    <a href="{{ route('Asset.index') }}"> Assets </a>
                </li>
                @endcan
                @can(["reports"])
                <li>
                    <a href="{{ route('Report.index') }}"> Reports </a>
                </li>
                @endcan
                @can(["coaching-lead"])
<li class="menu @if(\Request::route()->getName()=='Enquires.Failed') active @endif menu-single">
    <a href="{{ route('Enquires.Failed') }}" @if(\Request::route()->getName()=='Enquires.Failed') data-active="true" @else data-active="false" @endif class="menu-toggle">
        <div class="base-menu">
           
            <span>Failed Leads</span>
        </div>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
</li>
@endcan
            </ul>

        </div>
        
        @endcan

        @canany(['view-user','view-role','view-university','view-course'])
        <div class="submenu" id="setting">
            <ul class="submenu-list" data-parent-element="#setting">
                @can(["view-user"])
                    <li>
                        <a href="{{ route('users.index') }}"> User </a>
                    </li>
                @endcan
                @can(["view-role"])
                    <li>
                        <a href="{{ route('roles.index') }}"> Roles </a>
                    </li>
                @endcan
                @can(["view-university"])
                    <li>
                        <a href="{{ route('University.index') }}"> University </a>
                    </li>
                @endcan
                @can(["view-course"])
                    <li>
                        <a href="{{ route('Course.index') }}"> Course </a>
                    </li>
                @endcan
            </ul>
        </div>
        @endcan
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
