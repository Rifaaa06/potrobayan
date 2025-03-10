        <nav>
            <a href="{{ route('home') }}"><img src="images/logonobg.png"></a>
            <h1>Desa Wisata Potrobayan</h1>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="{{ route('home') }}">HOME</a></li>
                    <li><a href="{{ route('services') }}">SERVICES</a></li>
                    <li><a href="{{ route('gallery') }}">GALLERY</a></li>
                    <li><a href="{{ route('maps') }}">MAPS</a></li>
                    <li><a href="{{ route('reservation') }}">RESERVATION</a></li>
                    <li><a href="{{ route('alatCamp') }}">ALAT CAMP</a></li>
                    <li><a href="{{ route('akun') }}">AKUN</a></li>
                </ul>
            </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>