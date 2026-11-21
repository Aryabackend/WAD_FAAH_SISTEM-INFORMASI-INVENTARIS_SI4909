<?php

namespace App\Http\Controllers;

use App\Models\TataLetak;
use Illuminate\Http\Request;

class TataLetakController extends Controller
{
    private function aturan(?int $id = null): array
    {
        return [
            'nomor_lorong'    => 'required|string|max:20',
            'nomor_rak'       => 'required|string|max:20|unique:tata_letaks,nomor_rak,' . $id,
            'lokasi_gudang'   => 'required|string|max:100',
            'kapasitas_fisik' => 'required|integer|min:1',
            'satuan'          => 'required|in:Kg,Unit,Karton,Ton',
            'status'          => 'required|in:Tersedia,Penuh,Maintenance',
        ];
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');

        $data = TataLetak::when($keyword, function ($q) use ($keyword) {
                $q->where('nomor_lorong', 'like', "%{$keyword}%")
                  ->orWhere('nomor_rak', 'like', "%{$keyword}%");
            })
            ->orderBy('nomor_lorong')
            ->paginate(10)
            ->withQueryString();

        return view('tata-letak.index', compact('data', 'keyword'));
    }

    public function create()
    {
        return view('tata-letak.create');
    }

    public function store(Request $request)
    {
        TataLetak::create($request->validate($this->aturan()));

        return redirect()->route('tata-letak.index')
            ->with('sukses', 'Data berhasil disimpan.');
    }

    public function edit(TataLetak $tataLetak)
    {
        return view('tata-letak.edit', compact('tataLetak'));
    }

    public function update(Request $request, TataLetak $tataLetak)
    {
        $tataLetak->update($request->validate($this->aturan($tataLetak->id)));

        return redirect()->route('tata-letak.index')
            ->with('sukses', 'Data berhasil diperbarui.');
    }

    public function destroy(TataLetak $tataLetak)
    {
        $tataLetak->delete();

        return redirect()->route('tata-letak.index')
            ->with('sukses', 'Data berhasil dihapus.');
    }
}