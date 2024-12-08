<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} mt-4" aria-current="page"
                    href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link {{ Request::is('dashboard/rooms*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/rooms">
                    <div class="sb-nav-link-icon"><i class="fas fa-house-user"></i></div>
                    Rooms
                </a>

                <a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/users">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>

                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/categories">
                    <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                    Categories
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            TranquilHaven Hotel
        </div>
    </nav>
</div>
