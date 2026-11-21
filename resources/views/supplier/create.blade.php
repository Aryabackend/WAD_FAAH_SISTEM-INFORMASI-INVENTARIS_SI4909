<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier - Inventaris Gudang</title>

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
            max-width: 900px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        h1 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #788697;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #dce2e9;
            border-radius: 7px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 85px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .required {
            color: red;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 12px 20px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .save {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #263445;
        }

        @media(max-width: 600px) {
            body {
                padding: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Supplier</h1>

        <p class="subtitle">
            Masukkan informasi supplier baru ke dalam sistem inventaris gudang.
        </p>

        <form action="{{ route('supplier.store') }}" method="POST">

            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Kode Supplier <span class="required">*</span></label>
                    <input type="text" name="kode"
                           value="{{ old('kode') }}"
                           placeholder="Contoh: SUP001">
                    @error('kode')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Supplier <span class="required">*</span></label>
                    <input type="text" name="nama"
                           value="{{ old('nama') }}"
                           placeholder="Nama supplier">
                    @error('nama')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group full">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              placeholder="Alamat lengkap supplier">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Kota</label>
                    <input type="text" name="kota" value="{{ old('kota') }}">
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}">
                </div>

                <div class="form-group">
                    <label>Email Supplier</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>NIB</label>
                    <input type="text" name="nib" value="{{ old('nib') }}">
                </div>

                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" name="npwp" value="{{ old('npwp') }}">
                </div>

                <div class="form-group">
                    <label>Nama PIC</label>
                    <input type="text" name="pic" value="{{ old('pic') }}">
                </div>

                <div class="form-group">
                    <label>Jabatan PIC</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}">
                </div>

                <div class="form-group">
                    <label>Kontak</label>
                    <input type="text" name="kontak" value="{{ old('kontak') }}">
                </div>

                <div class="form-group">
                    <label>HP PIC</label>
                    <input type="text" name="hp_pic" value="{{ old('hp_pic') }}">
                </div>

                <div class="form-group">
                    <label>Email PIC</label>
                    <input type="email" name="email_pic" value="{{ old('email_pic') }}">
                </div>

            </div>

            <div class="actions">
                <button type="submit" class="button save">
                    Simpan Supplier
                </button>

                <a href="{{ route('supplier.index') }}" class="button back">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
