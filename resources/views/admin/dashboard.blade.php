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
        @include('sweetalert::alert')
        
        <main>
            <h1>Dashboard</h1>
            
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ $tanggal }}" class="form-control">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>

            <div class="insights">
                <div class="visitor">
                    <span class="material-symbols-outlined">people</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Pengunjung</h3>
                            <h1>{{ $totalPengunjung }}</h1><small>orang</small>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">
                               {{ number_format($persentaseKepadatan, 2) }}% 
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="table">
                <h1>Recent Visit</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>no_hp</th>
                            <th>jenis_kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->nama_lengkap }}</td>
                                <td>{{ $reservation->alamat }}</td>
                                <td>{{ $reservation->no_hp }}</td>
                                <td>{{ $reservation->orderType->jenis_kunjungan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tidak ada reservasi pada tanggal tersebut.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <script src="script.js"></script>
</body>
</html>