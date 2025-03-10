<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link rel="stylesheet" href="{{ asset('css/stylegm.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <section class="header">
        @include('part.navbar')
    </section>

    <section class="gallery">
        <h1>OUR GALLERY</h1>
        <p>Look at these!!!!!</p>

        <div class="row">
            <div class="gallery-col">
                <img src="images/camp.jpg">
                <div class="layer">
                    <h3><b>Camp</b></h3>
                    <a href="https://www.instagram.com/reel/CyKUbJHx9cG/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="gallery-btn">View Now</a>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/river.jpg">
                <div class="layer">
                    <h3><b>River</b></h3>
                    <a href="https://www.instagram.com/reel/C1wN2hcr0uL/?igsh=cWduZG5jcGVhYXdl" class="gallery-btn">View Now</a>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/picnic.jpg">
                <div class="layer">
                    <h3><b>Picnic</b></h3>
                    <a href="https://www.instagram.com/p/Ct9MiNWBm6m/?utm_source=qr&igsh=MXBkdHgyOTNqczdjdw==" class="gallery-btn">View Now</a>  
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/sunrise.jpg">
                <div class="layer">
                    <h3><b>Sunrise</b></h3>
                    <a href="https://www.instagram.com/reel/Ct1D2Xet2KE/?igsh=MXBiNzMzaXFmdXF3aA==" class="gallery-btn">View Now</a>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/other.jpg">
                <div class="layer">
                    <h3><b>Other</b></h3>
                    <a href="https://www.instagram.com/reel/C0tGuHWL-kg/?igsh=MWZoZXMwNjRwZTZvbA==" class="gallery-btn">View Now</a>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/sunset.jpg">
                <div class="layer">
                    <h3><b>Sunset</b></h3>
                    <a href="https://www.instagram.com/reel/CgT58ZzlVrR/?igsh=bDB1d3lsaGI3eHIz" class="gallery-btn">View Now</a>
                </div>
            </div>


        </div>
    </section>

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
