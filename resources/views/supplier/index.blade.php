
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier - Inventaris Gudang</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f6fa;
            padding: 30px;
            color: #263445;
        }

        .container {
            max-width: 1400px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #788697;
            font-size: 14px;
        }

        .button {
            background: #2563eb;
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 1300px;
        }

        th, td {
            padding: 13px 12px;
            text-align: left;
            border-bottom: 1px solid #edf0f4;
            font-size: 13px;
            white-space: nowrap;
        }

        th {
            background: #f8fafc;
            color: #526174;
        }

        .edit {
            color: #2563eb;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete {
            background: #dc2626;
            color: white;
            padding: 7px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #8995a5;
        }

        @media(max-width: 600px) {
            body {
                padding: 15px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Data Supplier</h1>
            <p class="subtitle">
                Kelola seluruh data pemasok barang gudang.
            </p>
        </div>

        <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
            <span style="color:#64748b; font-size:13px;">Login sebagai <strong>{{ auth()->user()->name }}</strong></span>
            <a href="{{ route('supplier.create') }}" class="button">
                + Tambah Supplier
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="button" style="background:#475569;">Logout</button>
            </form>
        </div>
    </div>

    <div class="card">

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <h3>Daftar Supplier</h3>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>NIB</th>
                        <th>NPWP</th>
                        <th>PIC</th>
                        <th>Kontak</th>
                        <th>Kota</th>
                        <th>HP PIC</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Email PIC</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->kode }}</td>
                            <td>{{ $supplier->nama }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>{{ $supplier->nib }}</td>
                            <td>{{ $supplier->npwp }}</td>
                            <td>{{ $supplier->pic }}</td>
                            <td>{{ $supplier->kontak }}</td>
                            <td>{{ $supplier->kota }}</td>
                            <td>{{ $supplier->hp_pic }}</td>
                            <td>{{ $supplier->telepon }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->jabatan }}</td>
                            <td>{{ $supplier->email_pic }}</td>

                            <td>
                                <a href="{{ route('supplier.edit', $supplier->id) }}"
                                   class="edit">
                                    Edit
                                </a>

                                <form action="{{ route('supplier.destroy', $supplier->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="15" class="empty">
                                Belum ada data supplier.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

</body>
</html>
