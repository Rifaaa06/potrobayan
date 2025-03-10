<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link rel="stylesheet" href="{{ asset('css/stylegm.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 30px auto;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .profile-picture {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .profile-details {
            margin-bottom: 20px;
        }

        .profile-details p {
            margin: 10px 0;
            color: #555;
        }

        .button-group {
            display: flex;
            flex-direction: column;
        }

        .button-group a {
            text-decoration: none;
        }

        .button-group .update {
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group .update:hover {
            background-color: #0056b3;
        }

        .button-group .logout {
            padding: 12px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group .logout:hover {
            background-color: #b30000;
        }
    </style>
</head>

<body>
    <section class="header">
        @include('part.navbar')
    </section>
    
    <div class="container">
        <h2>MY PROFILE</h2>

        <div class="profile-picture">
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Profile Picture">
            @endif
        </div>

        <div class="profile-details">
            <p><strong>Nama:</strong> {{ $user->nama_lengkap }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Alamat:</strong> {{ $user->address }}</p>
            <p><strong>No HP:</strong> {{ $user->no_hp }}</p>
        </div>

        <div class="button-group">
            <a href="{{ route('akun.update.view') }}"><button class="update" type="button">Update Profile</button></a>
            <br>
            <a href="{{ route('logout') }}"><button class="logout" type="button">Log Out</button></a>
        </div>
    </div>
    
    @include('part.footer')

    <!------JavaScript for Toggle Menu------>
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }
    </script>
</body>
</html>
