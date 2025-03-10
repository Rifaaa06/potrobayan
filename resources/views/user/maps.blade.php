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

    <section class="maps">
        <h4>Our Location</h4>
        <div class="lokasi">
            <p>Potrobayan, Srihardono, Kec. Pundong, Kabupaten Bantul, <br> Daerah Istimewa Yogyakarta 55771</br></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.404289466155!2d110.35496927319797!3d-7.957104779285473
            !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5533f9779119%3A0xd17a40df9392a991!2sPotrobayan%20River%20Camp!5e0!3m2!1sid
            !2sid!4v1714672268742!5m2!1sid!2sid"  height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
