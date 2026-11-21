<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Armada Operasional</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; background: #f8fafc; color: #0f172a; }
        .top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .btn { display: inline-block; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-edit { background: #d97706; color: #fff; }
        .btn-delete { background: #dc2626; color: #fff; }
        .alert { padding: 10px 14px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 14px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #cbd5e1; padding: 10px; text-align: left; }
        th { background: #e2e8f0; }
        .actions { display: flex; gap: 8px; align-items: center; }
        form { display: inline; margin: 0; }
    </style>
</head>
<body>
    <div class="top">
        <h2>Daftar Armada Operasional</h2>
        <a href="{{ route('armada.create') }}" class="btn btn-primary">+ Tambah Armada</a>
    </div>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Armada</th>
                <th>Seri</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($armadas as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->seri }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('armada.edit', $item) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('armada.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus armada ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data armada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>