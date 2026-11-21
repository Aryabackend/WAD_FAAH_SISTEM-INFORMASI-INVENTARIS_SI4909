<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArmadaController extends Controller
{
    public function index()
    {
        $armadas = Armada::latest()->get();
        return view('armada.index', compact('armadas'));
    }

    public function create()
    {
        return view('armada.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:120',
            'seri'     => 'required|string|max:60|unique:armadas,seri',
            'kategori' => 'required|string|max:60',
            'status'   => 'required|string|in:Tersedia,Digunakan,Perawatan',
        ]);

        Armada::create($validated);

        return redirect()->route('armada.index')
            ->with('success', 'Data armada berhasil ditambahkan.');
    }

    public function edit(Armada $armada)
    {
        return view('armada.edit', compact('armada'));
    }

    public function update(Request $request, Armada $armada)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:120',
            'seri'     => ['required', 'string', 'max:60', Rule::unique('armadas', 'seri')->ignore($armada->id)],
            'kategori' => 'required|string|max:60',
            'status'   => 'required|string|in:Tersedia,Digunakan,Perawatan',
        ]);

        $armada->update($validated);

        return redirect()->route('armada.index')
            ->with('success', 'Data armada berhasil diperbarui.');
    }

    public function destroy(Armada $armada)
    {
        $armada->delete();

        return redirect()->route('armada.index')
            ->with('success', 'Data armada berhasil dihapus.');
    }
}