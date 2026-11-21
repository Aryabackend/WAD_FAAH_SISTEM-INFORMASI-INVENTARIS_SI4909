<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tata Letak Gudang</title>
    <link rel="stylesheet" href="{{ asset('css/style-cari.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-hasil.css') }}">
</head>
<body>
    <h1>Master Tata Letak Gudang</h1>

    @if (session('sukses'))
        <p style="text-align:center; color:green;">{{ session('sukses') }}</p>
    @endif

    <form class="form" action="{{ route('tata-letak.index') }}" method="GET">
        <label>Masukkan Nomor Lorong atau Nomor Rak</label>
        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Contoh: L-01 atau R-01">
        <button type="submit">Cari</button>
    </form>

    <p><a href="{{ route('tata-letak.create') }}">+ Tambah data</a></p>

    <table>
        <tr>
            <th>No Lorong</th>
            <th>No Rak</th>
            <th>Lokasi Gudang</th>
            <th>Kapasitas Fisik</th>
            <th>Satuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse ($data as $item)
            <tr>
                <td>{{ $item->nomor_lorong }}</td>
                <td>{{ $item->nomor_rak }}</td>
                <td>{{ $item->lokasi_gudang }}</td>
                <td>{{ $item->kapasitas_fisik }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('tata-letak.edit', $item) }}">Edit</a>
                    <form action="{{ route('tata-letak.destroy', $item) }}" method="POST"
                          style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Data belum ada. Klik "Tambah data" untuk mengisi.</td>
            </tr>
        @endforelse
    </table>

    <p style="text-align:center;">
        @if ($data->previousPageUrl())
            <a href="{{ $data->previousPageUrl() }}">Sebelumnya</a>
        @endif
        Halaman {{ $data->currentPage() }} dari {{ $data->lastPage() }}
        @if ($data->nextPageUrl())
            <a href="{{ $data->nextPageUrl() }}">Berikutnya</a>
        @endif
    </p>
</body>
</html>