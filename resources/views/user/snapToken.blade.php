<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Proses Pembayaran</h2>
    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location.href = '{{ route("home") }}';
            },
            onPending: function(result){
                alert("Menunggu pembayaran.");
                console.log(result);
            },
            onError: function(result){
                alert("Pembayaran gagal!");
                console.log(result);
            }
        });
    };
</script>
</body>
</html>
