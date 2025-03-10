<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function calculateTotalHarga() {
            let hargaPerUnit = parseFloat(document.getElementById('harga_per_unit').value);
            let jumlah = parseInt(document.getElementById('jumlah').value);
            let tanggalSewa = new Date(document.getElementById('tanggal_sewa').value);
            let tanggalPengembalian = new Date(document.getElementById('tanggal_pengembalian').value);
            
            let diffTime = tanggalPengembalian.getTime() - tanggalSewa.getTime();
            let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Adjust for same-day rentals
            if (diffDays === 0) {
                diffDays = 1;
            }

            if (!isNaN(hargaPerUnit) && !isNaN(jumlah) && !isNaN(diffDays)) {
                let totalHarga = hargaPerUnit * jumlah * diffDays;
                document.getElementById('total_harga').value = totalHarga.toFixed(2);
                document.getElementById('total_harga_display').innerText = 'Rp ' + totalHarga.toFixed(2);
            }
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1>{{ $alat->nama_alat }}</h1>
    <img src="{{ $alat->image }}" alt="{{ $alat->nama_alat }}" class="img-fluid">
    <p>{{ $alat->deskripsi }}</p>
    <p>Stok: {{ $alat->stok }}</p>
    <p>Harga per unit: Rp {{ number_format($alat->harga, 2) }}</p>

    <form action="{{ route('keranjang.tambah', $alat->id) }}" method="POST" oninput="calculateTotalHarga()">
        @csrf
        <input type="hidden" id="harga_per_unit" value="{{ $alat->harga }}">

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" min="1" max="{{ $alat->stok }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_sewa">Tanggal Sewa:</label>
            <input type="date" id="tanggal_sewa" name="tanggal_sewa" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_harga">Total Harga:</label>
            <input type="hidden" id="total_harga" name="total_harga">
            <p id="total_harga_display">Rp 0.00</p>
        </div>

        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
    </form>
</div>
</body>
</html>
