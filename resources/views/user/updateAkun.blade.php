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

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="file"],
        form textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        form button[class="update"] {
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button[class="update"]:hover {
            background-color: #0056b3;
        }

        form button[class="cancel"] {
            padding: 12px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button[class="cancel"]:hover {
            background-color: #b30000;
        }

        div.success {
            padding: 10px;
            margin-bottom: 20px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        div.error {
            padding: 10px;
            margin-bottom: 20px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <section class="header">
        @include('part.navbar')
    </section>
    
    <div class="container">
        <h2>UPDATE PROFILE</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('akun.update') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="nama_lengkap">Name</label><br>
                <input id="nama_lengkap" type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required autofocus>
            </div>

            <div>
                <label for="email">Email</label><br>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="address">Address</label><br>
                <textarea id="address" name="address" required>{{ old('address', $user->address) }}</textarea>
            </div>

            <div>
                <label for="no_hp">No HP</label><br>
                <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" required>
            </div>

            <div>
                <label for="profile_picture">Profile Picture</label><br>
                <input id="profile_picture" type="file" name="profile_picture" accept="image/*">
            </div>

            <div>
                <label for="password">Password (leave blank to keep current password)</label><br>
                <input id="password" type="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label><br>
                <input id="password_confirmation" type="password" name="password_confirmation">
            </div>
            
            <div>
                <button class="update" type="submit">Update Profile</button>
            </div>
            <br>
            <div>
                <a href="{{ route('akun') }}"><button class="cancel" type="button">Cancel</button></a>
            </div>
        </form>
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
