@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<label>Nomor Lorong</label>
<input type="text" name="nomor_lorong" placeholder="Contoh: L-01"
       value="{{ old('nomor_lorong', $tataLetak->nomor_lorong ?? '') }}">

<label>Nomor Rak</label>
<input type="text" name="nomor_rak" placeholder="Contoh: R-01"
       value="{{ old('nomor_rak', $tataLetak->nomor_rak ?? '') }}">

<label>Lokasi Gudang</label>
<input type="text" name="lokasi_gudang" placeholder="Contoh: Gudang Utama"
       value="{{ old('lokasi_gudang', $tataLetak->lokasi_gudang ?? '') }}">

<label>Kapasitas Fisik</label>
<input type="number" name="kapasitas_fisik" placeholder="Contoh: 500"
       value="{{ old('kapasitas_fisik', $tataLetak->kapasitas_fisik ?? '') }}">

<label>Satuan</label>
<select name="satuan">
    @foreach (['Kg', 'Unit', 'Karton', 'Ton'] as $s)
        <option value="{{ $s }}" {{ old('satuan', $tataLetak->satuan ?? '') == $s ? 'selected' : '' }}>{{ $s }}</option>
    @endforeach
</select>

<label>Status</label>
<select name="status">
    @foreach (['Tersedia', 'Penuh', 'Maintenance'] as $s)
        <option value="{{ $s }}" {{ old('status', $tataLetak->status ?? '') == $s ? 'selected' : '' }}>{{ $s }}</option>
    @endforeach
</select>

<button type="submit">Simpan</button>
<a href="{{ route('tata-letak.index') }}">Batal</a>