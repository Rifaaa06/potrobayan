<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-warning {
            color: #212529;
            background-color: #ffc107;
            border: 1px solid #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

    </style>
</head>
<body>

    <div class="container">
        @include('adminpart.sidebar')
        @include('sweetalert::alert')
        <main>
            <h1>Daftar Alat Camping</h1>
            <a href="{{ route('admin.alatcamp.create') }}" class="btn btn-primary mb-3">Tambah Alat Camping</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alat_camps as $alatCamp)
                            <tr>
                                <td>{{ $alatCamp->nama_alat }}</td>
                                <td>{{ $alatCamp->deskripsi }}</td>
                                <td>{{ $alatCamp->stok }}</td>
                                <td>{{ $alatCamp->harga }}</td>
                                <td>
                                    @if($alatCamp->image)
                                        <img src="{{ asset('images/'.$alatCamp->image) }}" alt="{{ $alatCamp->nama }}" style="width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.alatcamp.edit', $alatCamp->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.alatcamp.destroy', $alatCamp->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </main>
        
    </div>

</body>
</html>