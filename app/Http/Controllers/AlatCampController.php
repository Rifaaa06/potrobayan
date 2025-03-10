<?php

namespace App\Http\Controllers;

use App\Models\AlatCamp;
use App\Models\SewaAlat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AlatCampController extends Controller
{
    public function index()
    {
        $alat_camps = AlatCamp::all();
        return view('admin.alatcamp.index', compact('alat_camps'));
    }

    public function create()
    {
        return view('admin.alatcamp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $alatCamp = new AlatCamp();
        $alatCamp->nama_alat = $request->nama_alat;
        $alatCamp->deskripsi = $request->deskripsi;
        $alatCamp->stok = $request->stok;
        $alatCamp->harga = $request->harga;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $alatCamp->image = $imageName;
        }

        $alatCamp->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect()->route('admin.alatcamp.index')->with('success', 'Alat camping berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alatCamp = AlatCamp::findOrFail($id);
        return view('admin.alatcamp.edit', compact('alatCamp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $alatCamp = AlatCamp::findOrFail($id);
        $alatCamp->nama_alat = $request->nama_alat;
        $alatCamp->deskripsi = $request->deskripsi;
        $alatCamp->stok = $request->stok;
        $alatCamp->harga = $request->harga;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $alatCamp->image = $imageName;
        }

        $alatCamp->save();
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('admin.alatcamp.index')->with('success', 'Alat camping berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alatCamp = AlatCamp::findOrFail($id);
        if ($alatCamp->image) {
            unlink(public_path('images').'/'.$alatCamp->image);
        }
        $alatCamp->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('admin.alatcamp.index')->with('success', 'Alat camping berhasil dihapus.');
    }

    public function show($id)
    {
        $alat = AlatCamp::findOrFail($id);
        return view('user.detailAlat', compact('alat'));
    }

}
