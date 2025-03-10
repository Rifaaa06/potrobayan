<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link rel="stylesheet" href="{{ asset('css/styler.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Header */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="number"],
        form select {
            width: 97%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form input[type="text"]:readonly,
        form input[type="email"]:readonly,
        form input[type="date"]:readonly,
        form input[type="number"]:readonly {
            background-color: #f1f1f1;
        }

        form button[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            form input[type="text"],
            form input[type="email"],
            form input[type="date"],
            form input[type="number"],
            form select {
                padding: 8px;
                font-size: 14px;
            }

            form button[type="submit"] {
                font-size: 16px;
            }
        }

    </style>
</head>

<body>
@include('sweetalert::alert')
    <section class="header">
        @include('part.navbar')
    </section>
    <div class="container">
    <h2>Reservasi</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <form action="{{ route('reservation_proses') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="jenis_kunjungan">Jenis Kunjungan:</label>
            <select id="jenis_kunjungan" name="jenis_kunjungan" required>
                @foreach($order_types as $type)
                    <option value="{{ $type->id }}">{{ $type->jenis_kunjungan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_datang">Tanggal Datang:</label>
            <input type="date" id="tanggal_datang" name="tanggal_datang" required>
        </div>

        <div class="form-group">
            <label for="jumlah_orang">Jumlah Orang:</label>
            <input type="number" id="jumlah_orang" name="jumlah_orang" required>
        </div>

        <div class="form-group">
            <label for="harga_tiket">Harga Tiket (per orang):</label>
            <input type="text" id="harga_tiket" name="harga_tiket" readonly>
        </div>

        <div class="form-group">
            <label for="total_harga">Total Harga:</label>
            <input type="text" id="total_harga" name="total_harga" readonly>
        </div>

        <button type="submit">Reservasi</button>
    </form>
</div>

<script>
    document.getElementById('jenis_kunjungan').addEventListener('change', function() {
        let jenisKunjungan = this.value;
        let hargaTiket = 0;

        @foreach($order_types as $type)
            if (jenisKunjungan == {{ $type->id }}) {
                hargaTiket = {{ $type->harga_tiket }};
            }
        @endforeach

        document.getElementById('harga_tiket').value = hargaTiket;
        calculateTotalHarga();
    });

    document.getElementById('jumlah_orang').addEventListener('input', calculateTotalHarga);

    function calculateTotalHarga() {
        let hargaTiket = document.getElementById('harga_tiket').value;
        let jumlahOrang = document.getElementById('jumlah_orang').value;
        let totalHarga = hargaTiket * jumlahOrang;
        document.getElementById('total_harga').value = totalHarga;
    }
</script>

    
    @include('part.footer')

</body>

</html>

