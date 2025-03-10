<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamp;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $alat = AlatCamp::findOrFail($id);
        $jumlah = $request->input('jumlah');
        $tanggalSewa = $request->input('tanggal_sewa');
        $tanggalPengembalian = $request->input('tanggal_pengembalian');
        $totalHarga = $request->input('total_harga');

        // Simpan data ke session
        $keranjang = session()->get('keranjang', []);
        $keranjang[$id] = [
            'alat_camp_id' => $alat->id,
            'user_id' => Auth::id(),
            'nama_alat' => $alat->nama_alat,
            'jumlah' => $jumlah,
            'harga' => $alat->harga,
            'tanggal_sewa' => $tanggalSewa,
            'tanggal_pengembalian' => $tanggalPengembalian,
            'total_harga' => $totalHarga,
        ];
        session()->put('keranjang', $keranjang);

        return redirect()->route('alatCamp', $id)->with('success', 'Alat berhasil ditambah ke keranjang!');
    }

    public function hapusItem(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        unset($keranjang[$request->id]);

        session()->put('keranjang', $keranjang);

        return redirect()->route('pembayaran.sewa')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}


