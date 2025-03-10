        <aside>
            <div class="top">
                <div class="logo">
                    <h1>Desa Wisata Potrobayan</h1>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">home</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ route('admin.reservations') }}" class="{{ Request::is('reservations*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">people</span>
                    <h3>Reservation</h3>
                </a>
                <a href="{{ route('admin.alatcamp.index') }}" class="{{ Request::is('alatcamp*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">camping</span>
                    <h3>Alat Camping</h3>
                </a>
                <a href="{{ route('laporan.index') }}" class="{{ Request::is('laporan*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Laporan</h3>
                </a>
                <a class="logout" href="{{ route('home') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>