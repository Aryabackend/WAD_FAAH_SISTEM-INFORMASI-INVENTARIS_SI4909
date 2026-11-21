<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarBarang;

class DaftarBarangController extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->input('namaBarang');
        $kategori = $request->input('kategori');

        $query = DaftarBarang::query();

        if (!empty($nama) && !empty($kategori)) {
            $query->where('nama_barang', 'LIKE', "%{$nama}%")
                  ->where('kategori', $kategori);
        } elseif (!empty($nama)) {
            $query->where('nama_barang', 'LIKE', "%{$nama}%");
        } elseif (!empty($kategori)) {
            $query->where('kategori', $kategori);
        }

        $items = $query->get();
        $totalRows = $query->count();          

        return view('inventory.index', compact('items', 'totalRows', 'nama', 'kategori'));
    }

    public function store(Request $request)
    {
        DaftarBarang::create([
            'nama_barang' => $request->namaBarang,
            'kategori' => $request->kategori,
            'spek' => $request->spek,
            'berat' => $request->beratUnit,
            'stok' => $request->stok,
        ]);

        return redirect()->route('inventory.index');
    }

    public function update(Request $request, $id)
    {
        $item = DaftarBarang::findOrFail($id);
        $item->update([
            'nama_barang' => $request->namaBarang,
            'kategori'=> $request->kategori,
            'spek' => $request->spek,
            'berat' => $request->beratUnit,
            'stok' => $request->stok,
        ]);
        return redirect()->route('inventory.index');
    }

    public function destroy($id)
    {
        $item = DaftarBarang::findOrFail($id);
        $item->delete();

        return redirect()->route('inventory.index');
    }
}
