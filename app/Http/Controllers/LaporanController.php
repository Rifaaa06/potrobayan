<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\SewaAlat;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', Carbon::today()->toDateString());
        $reservations = Reservation::where('payment_status', 'paid')->get();

        $sewa_alat = SewaAlat::whereDate('tanggal_pengembalian', $tanggal)->get();
        $sewa_alat = SewaAlat::with(['alatCamp', 'user'])->get();
        

        $total_pemasukan_reservasi = $reservations->sum('total_harga');
        $total_pemasukan_sewa = $sewa_alat->sum('total_harga');
        $total_pemasukan = $total_pemasukan_reservasi + $total_pemasukan_sewa;

        return view('admin.laporan.index', compact('reservations', 'sewa_alat', 'total_pemasukan', 'tanggal'));
    }

    
}
