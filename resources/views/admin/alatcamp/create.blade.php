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
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        main h1 {
            margin-bottom: 20px;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('adminpart.sidebar')
        @include('sweetalert::alert')
        <main>
            <h1>Tambah Alat Camping</h1>
            <form action="{{ route('admin.alatcamp.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_alat">Nama Alat:</label>
                    <input type="text" id="nama_alat" name="nama_alat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="image">Gambar:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </main>
    </div>

</body>
</html>