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
            <h1>Laporan Pemasukan</h1>
            <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ $tanggal }}" class="form-control">
            </div>
            <br>
            <h2>Total Pemasukan: Rp {{ number_format($total_pemasukan, 2) }}</h2>

            <div class="table">
            <h2>Pemasukan dari Reservations</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Penyewa</th>
                            <th>Tanggal Checkin</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->nama_lengkap }}</td>
                                <td>{{ $reservation->tanggal_datang }}</td>
                                <td>Rp {{ number_format($reservation->total_harga, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            <div class="table">
                <h2>Pemasukan dari Sewa Alat</h2>
                <table>
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
                                <td>{{ $sewa->user->nama_lengkap }}</td>
                                <td>{{ $sewa->tanggal_sewa }}</td>
                                <td>{{ $sewa->tanggal_pengembalian }}</td>
                                <td>Rp {{ number_format($sewa->total_harga, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>    
</body>
</html>