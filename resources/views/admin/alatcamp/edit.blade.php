<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        main {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        main h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 1rem;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus {
            background-color: #fff;
            border-color: #007bff;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group img {
            display: block;
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1.25rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        
        .cancel {
            text-align: center;
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1.25rem;
            color: #fff;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('adminpart.sidebar')
        <main>
            <h1>Edit Alat Camping</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.alatcamp.update', $alatCamp->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_alat">Nama Alat:</label>
                    <input type="text" id="nama_alat" name="nama_alat" class="form-control" value="{{ $alatCamp->nama_alat }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ $alatCamp->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" class="form-control" value="{{ $alatCamp->stok }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" class="form-control" value="{{ $alatCamp->harga }}" required>
                </div>
                <div class="form-group">
                    <label for="current_image">Gambar Saat Ini:</label>
                    @if($alatCamp->image)
                        <div>
                            <img src="{{ asset('images/' . $alatCamp->image) }}" alt="{{ $alatCamp->nama_alat }}" style="max-width: 200px; max-height: 200px;">
                        </div>
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Ganti Gambar:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <br>
                <a href="{{ route('admin.alatcamp.index') }}" class="cancel">Cancel</a>
            </form>
        </main>
    </div>
</body>
</html>
