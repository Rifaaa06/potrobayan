<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link rel="stylesheet" href="{{ asset('css/stylel.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <section class="header">
        @include('part.navbar')
    </section>

    <div class="services" id="services">
        <h1>Layanan</h1>
        <h2>Fasilitas</h2>
        <div class="photo-grid">
            <div class="photo-item">
                <img src="images/tenda2.jpeg" alt="Foto 1">
                <h3>Area Camping</h3>
                <p> Area camping ini menawarkan pemandangan yang indah 
                    dengan hamparan lahan yang luas, sempurna untuk mendirikan tenda 
                    dan menikmati alam terbuka. </p>
            </div>
            
            <div class="photo-item">
                <img src="images/parkiran.jpeg" alt="Foto 2">
                <h3>Tempat Parkir</h3>
                <p> Parkiran yang luas, dengan deretan 
                    tempat parkir yang seakan tak berujung, 
                    memberikan ruang yang cukup untuk puluhan kendaraan.</p>
            </div>
            <div class="photo-item">
                <img src="images/toilet.jpeg" alt="Foto 3">
                <h3>Toilet</h3>
                <p> Toilet di area camping ini sederhana namun bersih, 
                    dengan fasilitas dasar yang terjaga rapi dan nyaman digunakan.</p>
            </div>

            <div class="photo-item">
                <img src="images/warung.jpeg" alt="Foto 4">
                <h3>Warung</h3>
                <p> Warung jajan di area camping sederhana 
                    menawarkan camilan ringan, minuman segar, dan makanan praktis untuk orang yang berkemah, 
                    menciptakan suasana yang akrab dan nyaman di tengah alam.</p>
            </div>
            <div class="photo-item">
                <img src="images/sewatenda.jpeg" alt="Foto 5">
                <h3>Tempat Penyewaan Tenda</h3>
                <p> 
                    Area camping ini menyediakan layanan persewaan tenda 
                    yang dapat dipesan sebelumnya untuk memudahkan para pengunjung 
                    menikmati alam bebas tanpa perlu membawa perlengkapan sendiri</p>
            </div>
        </div>
    </div>

    @include('part.footer')

    <script>
        var navLinks= document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }
    </script>
</body>
</html>