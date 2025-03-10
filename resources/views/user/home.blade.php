<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .header {
            min-height: 100vh;
            width:  100%;
            background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url(/images/aa.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
        }
    </style>
</head>

<body>
    <section class="header">
        @include('part.navbar')
        @include('sweetalert::alert')
        <div class="text-box">
            <h1>The Best Camping Spot in Yogyakarta </h1>
            <p>Potrobayan  is a small village located in the heart of Yogyakarta.<br> It's surrounded by beautiful nature and offers a unique experience for tourists who wants to camp.</p>
            <a href="" class="hero-btn">Kunjungi kami</a>
        </div>
    </section>

<!--Course-->
    <section class="gallery">
        <h2>Our Gallery</h>
        <p>Look at these!!!!!</p>

        <div class="row">
            <div class="gallery-col">
                <img src="images/IMG_5463.JPG">
                <div class="layer">
                    <h3>The River</h3>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/IMG_5499.JPG">
                <div class="layer">
                    <h3>The Ground</h3>
                </div>
            </div>
            <div class="gallery-col">
                <img src="images/IMG_5514.JPG">
                <div class="layer">
                    <h3>Shady Tree</h3>
                </div>
            </div>
        </div>
    </section>

    <!--Facilities-->
    <section class="facilities">
        <h1>Our Facilities</h1>
        <p>What an Interesting Things</p>

        <div class="row">
            <div class="facilities-col">
            <img src="images/toilet.jpg">
            <h3>Toilet</h3>
            <p>This camp has a clean toilet</p>
        </div>
        
        <div class="facilities-col">
            <img src="images/tentt.jpg">
            <h3>Tent</h3>
            <p>This camp has a good quality Tent</p>
        </div>
        
        <div class="facilities-col">
            <img src="images/parkir.jpg">
            <h3>Parking Lot</h3>
            <p>This camp has a large parking lot for your motorcycle.</p>
        </div>
    </section>

    <!--Testimonials-->
    <section class="testimonials">
        <h1>What our visitor says</h1>

        <div class="row">
            <div class="testimonial-col">
                <img src="images/rf.jpg">
                <div>
                    <p>"Desa Wisata Patrobayan merupakan destinasi yang luar biasa untuk bersantai dan menikmati alam. Saya mengunjungi tempat ini bersama keluarga pada akhir pekan lalu dan kami benar-benar terkesan. Pemandangan Sungai Opak yang jernih dan alami sangat menakjubkan, dan kami senang bisa berkemah di tepi sungai sembari menikmati segarnya udara pegunungan. Desa yang masih asri dan ramah penduduknya juga menambah kesan menyenangkan. Hanya saja, beberapa fasilitas seperti toilet dan tempat makan masih perlu ditingkatkan. Namun secara keseluruhan, pengalaman kami di Desa Wisata Patrobayan sangat memuaskan."</p>
                    <h3>Rifa</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>

            <div class="testimonial-col">
                <img src="images/R.jpg">
                <div>
                    <p>"The Opak River flowing through Patrobayan Tourism Village is truly amazing! I really enjoyed relaxing by the riverside, breathing in the fresh air, and admiring the surrounding natural beauty. Camping experience here is also extraordinary, especially at night when we can hear the peaceful sounds of nature. The friendly villagers and tranquil atmosphere make my vacation even more memorable. My only suggestion is to pay more attention to the cleanliness of public facilities such as bathrooms and dining areas. However, overall, I highly recommend Patrobayan Tourism Village as a relaxing and enjoyable weekend getaway destination."</p>
                    <h3>Yohanes Rivan</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>

        </div>
    </section>

    <!--Call to action-->
    <section class="cta">
        <h1>Enroll </h1>
        <a href="" class="hero-btn">CONTACT US</a>
    </section>

    @include('part.footer')


<!------JavaScript for Toggle Menu------>
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