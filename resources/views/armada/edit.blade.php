<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Armada</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; background: #f8fafc; color: #0f172a; }
        .form-group { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input, select { width: 320px; max-width: 100%; padding: 8px; border: 1px solid #94a3b8; border-radius: 4px; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .btn { padding: 8px 14px; border-radius: 6px; border: none; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-back { background: #64748b; color: #fff; margin-left: 6px; }
    </style>
</head>
<body>
    <h2>Edit Armada Operasional</h2>

    <form action="{{ route('armada.update', $armada) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Armada</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $armada->nama) }}">
            @error('nama') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="seri">Nomor Seri</label>
            <input type="text" id="seri" name="seri" value="{{ old('seri', $armada->seri) }}">
            @error('seri') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $armada->kategori) }}">
            @error('kategori') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                @foreach (['Tersedia', 'Digunakan', 'Perawatan'] as $st)
                    <option value="{{ $st }}" @selected(old('status', $armada->status) === $st)>{{ $st }}</option>
                @endforeach
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('armada.index') }}" class="btn btn-back">Kembali</a>
    </form>
</body>
</html>