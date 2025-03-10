<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order_type;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Membatasi akses hanya untuk user yang sudah login
    }

    public function showReservationForm()
    {
        $order_types = Order_type::all(); // Fetch all order types
        return view('user.reservation', compact('order_types'));
    }

    public function submitReservation(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'jenis_kunjungan' => 'required|exists:order_types,id',
            'tanggal_datang' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        // Simpan data sementara ke dalam sesi
        $reservationData = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kunjungan' => $request->jenis_kunjungan,
            'tanggal_datang' => $request->tanggal_datang,
            'jumlah_orang' => $request->jumlah_orang,
            'user_id' => Auth::id(),
        ];

        session(['reservationData' => $reservationData]);

        // Redirect ke halaman pembayaran
        return redirect()->route('payment');
    }

    public function payment()
    {
        $reservationData = session('reservationData');
        if (!$reservationData) {
            return redirect()->route('reservation.form')->with('error', 'Data reservasi tidak ditemukan.');
        }

        $order_types = Order_type::findOrFail($reservationData['jenis_kunjungan']);
        $total_harga = $order_types->harga_tiket * $reservationData['jumlah_orang'];
        $reservationData['total_harga'] = $total_harga;
        $reservationData['harga_tiket'] = $order_types->harga_tiket;

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
                'first_name' => $reservationData['nama_lengkap'],
                'email' => $reservationData['email'],
                'phone' => $reservationData['no_hp'],
            ],
            'item_details' => [
                [
                    'id' => $reservationData['jenis_kunjungan'],
                    'price' => $order_types->harga_tiket,
                    'quantity' => $reservationData['jumlah_orang'],
                    'name' => $order_types->jenis_kunjungan
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('user.payment', compact('snapToken', 'reservationData'));
        } catch (\Exception $e) {
            return redirect()->route('reservation.form')->with('error', 'Gagal membuat transaksi. Silakan coba lagi.');
        }
    }

    public function paymentCallback(Request $request)
    {
        // Log request dari Midtrans
        Log::info('Midtrans Callback', $request->all());

        $reservationData = session('reservationData');
        if (!$reservationData) {
            return response()->json(['message' => 'Data reservasi tidak ditemukan.'], 404);
        }

        // Verifikasi pembayaran disini
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                DB::transaction(function () use ($reservationData) {
                    Reservation::create([
                        'nama_lengkap' => $reservationData['nama_lengkap'],
                        'email' => $reservationData['email'],
                        'no_hp' => $reservationData['no_hp'],
                        'alamat' => $reservationData['alamat'],
                        'jenis_kunjungan' => $reservationData['jenis_kunjungan'],
                        'tanggal_datang' => $reservationData['tanggal_datang'],
                        'jumlah_orang' => $reservationData['jumlah_orang'],
                        'harga_tiket' => $reservationData['harga_tiket'],
                        'total_harga' => $reservationData['total_harga'],
                        'user_id' => $reservationData['user_id'],
                        'order_type_id' => $reservationData['jenis_kunjungan'],
                        'payment_status' => 'paid',
                    ]);

                    // Hapus data sementara dari sesi
                    session()->forget('reservationData');
                });

                return response()->json(['message' => 'Reservasi berhasil disimpan.'], 200);
            }
        }

        return response()->json(['message' => 'Pembayaran gagal.'], 400);
    }

    public function paymentProcess(Request $request)
    {
        // Simulasi sukses pembayaran
        return $this->paymentCallback($request);
    }
}
