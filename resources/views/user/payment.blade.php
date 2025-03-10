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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
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

        form-group {
            margin-bottom: 15px;
        }

        form .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        form .form-group input,
        form .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button {
            background-color: #0056b3;
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
        <h1>Proses Pembayaran</h1>
        <p>Nama Lengkap: {{ $reservationData['nama_lengkap'] }}</p>
        <p>Email: {{ $reservationData['email'] }}</p>
        <p>No HP: {{ $reservationData['no_hp'] }}</p>
        <p>Alamat: {{ $reservationData['alamat'] }}</p>
        <p>Jenis Kunjungan: {{ $reservationData['jenis_kunjungan'] }}</p>
        <p>Tanggal Datang: {{ $reservationData['tanggal_datang'] }}</p>
        <p>Jumlah Orang: {{ $reservationData['jumlah_orang'] }}</p>
        <p>Total Harga: Rp {{ number_format($reservationData['total_harga'], 0, ',', '.') }}</p>

        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil");
                    // Lakukan sesuatu setelah pembayaran berhasil
                    window.location.href = "{{ route('home') }}";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran");
                    // Lakukan sesuatu setelah pembayaran pending
                },
                onError: function(result){
                    alert("Pembayaran gagal");
                    // Lakukan sesuatu setelah pembayaran gagal
                },
                onClose: function(){
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                    // Lakukan sesuatu jika pengguna menutup popup tanpa menyelesaikan pembayaran
                }
            });
        };
    </script>
    
    @include('part.footer')

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisKunjunganElement = document.getElementById('jenis_kunjungan');
            const jumlahOrangElement = document.getElementById('jumlah_orang');
            const hargaTiketElement = document.getElementById('harga_tiket');
            const totalHargaElement = document.getElementById('total_harga');

            const updateHargaTiket = () => {
                const jenisKunjungan = jenisKunjunganElement.value;
                let hargaTiket = 0;

                if (jenisKunjungan === 'Wisata') {
                    hargaTiket = 3000;
                } else if (jenisKunjungan === 'Camping') {
                    hargaTiket = 10000;
                }

                hargaTiketElement.value = hargaTiket;
                updateTotalHarga();
            };

            const updateTotalHarga = () => {
                const jumlahOrang = jumlahOrangElement.value || 0;
                const hargaTiket = hargaTiketElement.value || 0;
                totalHargaElement.value = jumlahOrang * hargaTiket;
            };

            jenisKunjunganElement.addEventListener('change', updateHargaTiket);
            jumlahOrangElement.addEventListener('input', updateTotalHarga);

            // Initialize harga tiket on page load
            updateHargaTiket();
        });
    </script> -->
</body>

</html>

