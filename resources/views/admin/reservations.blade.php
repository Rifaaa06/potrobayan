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
            <div class="table">
                <h1>All Reservations</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Visit Type</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->nama_lengkap }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->no_hp }}</td>
                            <td>{{ $reservation->orderType->jenis_kunjungan }}</td>
                            <td>{{ $reservation->tanggal_datang }}</td>
                            <td>
                                <!-- Actions like edit, delete -->
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
        </main>

    </div>

    <script src="script.js"></script>
</body>
</html>