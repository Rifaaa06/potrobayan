<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $reservations = Reservation::whereDate('tanggal_datang', $tanggal)->get();
        // Hitung total pengunjung pada hari tersebut
        $totalPengunjung = $reservations->count();

        // Hitung persentase kepadatan pengunjung
        $kapasitasMaksimal = 100; // Misalkan kapasitas maksimal adalah 100
        $persentaseKepadatan = ($totalPengunjung / $kapasitasMaksimal) * 100;

        return view('admin.dashboard', compact('tanggal', 'reservations', 'totalPengunjung', 'persentaseKepadatan'));
    }

    public function reservations()
    {
        $reservations = Reservation::with('user', 'orderType')->get();
        return view('admin.reservations', compact('reservations'));
    }
}