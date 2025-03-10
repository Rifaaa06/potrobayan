<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="container">
        @include('adminpart.sidebar')
        <main>
            <h1>Daftar Sewa Alat Camping</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Alat</th>
                        <th>Nama Penyewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sewa_alat as $sewa)
                        <tr>
                            <td>{{ $sewa->alatCamp->nama_alat }}</td>
                            <td>{{ $sewa->user->name }}</td>
                            <td>{{ $sewa->tanggal_sewa }}</td>
                            <td>{{ $sewa->tanggal_pengembalian }}</td>
                            <td>{{ $sewa->total_harga }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
        
    </div>
</body>
</html>