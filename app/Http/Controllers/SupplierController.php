<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();

        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|max:20|unique:supplier,kode',
            'nama' => 'required|max:100',
            'alamat' => 'nullable|string',
            'nib' => 'nullable|max:50',
            'npwp' => 'nullable|max:50',
            'pic' => 'nullable|max:50',
            'kontak' => 'nullable|max:20',
            'kota' => 'nullable|max:50',
            'hp_pic' => 'nullable|max:20',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email|max:100',
            'jabatan' => 'nullable|max:50',
            'email_pic' => 'nullable|email|max:100',
        ]);

        Supplier::create($validated);

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'max:20',
                Rule::unique('supplier', 'kode')->ignore($supplier->id),
            ],
            'nama' => 'required|max:100',
            'alamat' => 'nullable|string',
            'nib' => 'nullable|max:50',
            'npwp' => 'nullable|max:50',
            'pic' => 'nullable|max:50',
            'kontak' => 'nullable|max:20',
            'kota' => 'nullable|max:50',
            'hp_pic' => 'nullable|max:20',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email|max:100',
            'jabatan' => 'nullable|max:50',
            'email_pic' => 'nullable|email|max:100',
        ]);

        $supplier->update($validated);

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus.');
    }
}
