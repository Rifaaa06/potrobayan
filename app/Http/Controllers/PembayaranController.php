<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SewaAlat;
use App\Models\AlatCamp;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil data dari keranjang untuk ditampilkan di halaman pembayaran
        $keranjang = session()->get('keranjang', []);
        $total_harga = array_sum(array_column($keranjang, 'total_harga')); // Hitung total harga

        return view('user.paymentSewa', compact('keranjang', 'total_harga'));
    }

    public function paymentProcess(Request $request)
    {
        // Ambil data dari keranjang
        $keranjang = session()->get('keranjang', []);
        $total_harga = array_sum(array_column($keranjang, 'total_harga'));

        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Buat transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $total_harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
            'item_details' => array_map(function ($item) {
                return [
                    'id' => $item['alat_camp_id'],
                    'price' => $item['harga'],
                    'quantity' => $item['jumlah'],
                    'name' => $item['nama_alat'],
                ];
            }, $keranjang),
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('user.snapToken', compact('snapToken', 'keranjang', 'total_harga'));
    }

    public function paymentCallback(Request $request)
    {
        // Midtrans callback handling logic
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $keranjang = session()->get('keranjang', []);

                DB::transaction(function () use ($keranjang) {
                    foreach ($keranjang as $item) {
                        SewaAlat::create([
                            'alat_camp_id' => $item['alat_camp_id'],
                            'user_id' => $item['user_id'],
                            'tanggal_sewa' => $item['tanggal_sewa'],
                            'tanggal_pengembalian' => $item['tanggal_pengembalian'],
                            'total_harga' => $item['total_harga'],
                        ]);

                        $alat = AlatCamp::find($item['alat_camp_id']);
                        if ($alat) {
                            $alat->stok -= $item['jumlah'];
                            $alat->save();
                        }
                    }
                });

                session()->forget('keranjang');

                return redirect()->route('home')->with('success', 'Pembayaran berhasil dilakukan.');
            }
        }

        return redirect()->route('home')->with('error', 'Pembayaran gagal dilakukan.');
    }
}
