<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sewa Alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Pembayaran Sewa Alat</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if (!empty($keranjang))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Harga per Unit</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $id => $item)
                    <tr>
                        <td>{{ $item['nama_alat'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['tanggal_sewa'] }}</td>
                        <td>{{ $item['tanggal_pengembalian'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 2) }}</td>
                        <td>Rp {{ number_format($item['total_harga'], 2) }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-right"><strong>Total Keseluruhan</strong></td>
                    <td><strong>Rp {{ number_format($total_harga, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('pembayaran.sewa.proses') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
</div>
</body>
</html>
