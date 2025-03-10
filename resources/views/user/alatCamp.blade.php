<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Potrobayan</title>
    <link rel="stylesheet" href="{{ asset('css/stylel.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .col-md-4 {
            flex: 0 0 30%;
            box-sizing: border-box;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-decoration:none;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card-link:hover {
            text-decoration: none;
            color: inherit;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card-text strong {
            font-weight: bold;
        }

        .btn {
            margin-top:20px;
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
    </style>
</head>
<body>
    @include('part.navbar')
    <a href="{{ route('pembayaran') }}" class="btn btn-primary">Keranjang</a>
    <div class="container">
        <h1>Alat Camping</h1>
        <div class="row">
            @foreach($alat_camps as $alatCamp)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm"><a href="{{ route('alat.show', $alatCamp->id) }}">
                        
                        @if($alatCamp->image)
                            <img src="{{ asset('images/' . $alatCamp->image) }}" class="card-img-top" alt="{{ $alatCamp->nama }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $alatCamp->nama_alat }}</h5>
                            <p class="card-text">{{ $alatCamp->deskripsi }}</p>
                            <p class="card-text"><strong>Stok:</strong> {{ $alatCamp->stok }}</p>
                            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($alatCamp->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('part.footer')
</body>
</html>