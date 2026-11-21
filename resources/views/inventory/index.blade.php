<!DOCTYPE html> 
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Warehouse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
        <link href="{{ asset('style.css') }}" rel="stylesheet">
    </head>
    <body class="d-flex flex-column gap-12">
        <header>
            <nav class="navbar border border-bottom-2 border-top-0 border-start-0 border-end-0 fg-2">
                <div class="container-fluid d-flex gap-3 justify-content-start">
                    <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inventory Master Data</a>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <span>
                            Logged in as: <strong>{{ auth()->user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    </div>
                    <dialog class="drawer drawer-start" tabindex="-1" id="navbarTogglerDemo03" aria-labelledby="navbarTogglerDemo03Label">
                        <div class="drawer-header">
                            <h5 class="drawer-title" id="navbarTogglerDemo03Label">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                        </div>
                        <div class="drawer-body">
                            <ul class="navbar-nav me-auto mb-2">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                                <button class="btn-outline theme-success" type="submit">Search</button>
                            </form>
                        </div>
                    </dialog>

                </div>
            </nav>
        </header>
        <main class="container">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex flex-row justify-content-between align-items-center">
                    <div class="card-text" >Data Inventory</div>
                    <button type="button" class="btn-solid theme-primary token-demo" data-bs-toggle="dialog" data-bs-target="#staticBackdropDialog" data-bs-backdrop="static">+ Tambahkan Item</button >
                </div>
                <div>
                    <dialog class="dialog" id="staticBackdropDialog">
                        <div class="dialog-header">
                            <h1 class="dialog-title">Static backdrop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <form class="form1" action="{{ route('inventory.store') }}" method="post">
                            @csrf
                            <div class="dialog-body d-flex flex-column gap-3">
                                <div class="mb-3">
                                    <label class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="namaBarang">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Berat Unit (KG)</label>
                                    <input type="text" class="form-control" name="beratUnit">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="text" class="form-control" name="stok">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-control" id="sizesSelectDefault" name="kategori">
                                        <option value="" id="pilih" selected >Pilih Kategori...</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Perkakas">Perkakas</option>
                                        <option value="Alat Tulis">Alat Tulis</option>
                                        <option value="Hardware Komputer">Hardware Komputer</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Spesifikasi Teknis</label>
                                    <textarea class="form-control" name="spek"></textarea>
                                </div>
                            </div>
                            <div class="container dialog-footer">
                                <button class="btn-solid theme-primary" type="submit" id="submit">Submit</button>
                            </div>
                        </form>
                    </dialog>
                </div>
                <div class="card-body d-flex flex-row justify-content-between align-items-center  ">
                    <form action="{{ route('inventory.index') }}" method="get">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <input type="text" id="disabledTextInput" class="form-control" name="namaBarang" value="{{ $nama ?? '' }}" placeholder="Cari Barang...">
                            </div>
                            <div>
                                <select class="form-control" id="sizesSelectDefault" name="kategori">
                                    <option value='' id='pilih' selected >Pilih Kategori...</option>
                                    <option value='Elektronik'>Elektronik</o`ption>
                                    <option value='Perkakas'>Perkakas</option>
                                    <option value='Alat Tulis'>Alat Tulis</option>
                                    <option value='Hardware Komputer'>Hardware Komputer</option>
                                </select>   
                            </div>
                            <button type="submit" class="btn-solid theme-primary">Cari</button>
                        </div>  
                    </form>
                    <p class="card-text">Menampilkan {{ $totalRows }} Baris data</p>
                </div>
                <div class="p-4">
                    <div class="table-responsive table-card">
                    <table class = "table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Spek</th>
                        <th>Berat Unit (KG)</th>
                        <th>Stok</th>
                        @if(count($items) >= 1)
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $row)
                        <tr>
                            <td class='align-content-center'>{{ $row->id }}</td>
                            <td class='align-content-center'>{{ $row->nama_barang }}</td>
                            <td class='align-content-center'>{{ $row->kategori }}</td>
                            <td class='align-content-center'>{{ $row->spek }}</td>
                            <td class='align-content-center'>{{ $row->berat }}</td>
                            <td class='align-content-center'>{{ $row->stok }}</td>
                            <td class="w-1">
                                <div class="d-flex flex-row justify-content-center gap-3 w-100">
                                    <button type="submit" class="theme-danger btn-solid" data-bs-toggle="dialog" data-bs-target="#hapusModal{{ $row->id }}">Hapus</button>
                                    <button type="submit" class="theme-warning btn-solid" data-bs-toggle="dialog" data-bs-target="#updateModal{{ $row->id }}">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <div>
                            <dialog class="dialog" id="hapusModal{{ $row->id }}">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                </div>
                                <div class="dialog-body">
                                    <p class="text-center">Hapus data ?<p>
                                </div>
                                <div class="dialog-footer">
                                <form class="form1" action="{{ route('inventory.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <button class="theme-danger btn-solid" type="submit">Hapus</button>
                                </form>
                                </div>
                            </dialog>
                        </div>

                        <div>
                            <dialog class="dialog" id="updateModal{{ $row->id }}">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Edit data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                </div>
                                <form class="form1" action="{{ route('inventory.update', $row->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <div class="dialog-body d-flex flex-column gap-3">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" name="namaBarang" value="{{ $row->nama_barang }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Berat Unit (KG)</label>
                                            <input type="text" class="form-control" name="beratUnit" value="{{ $row->berat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok</label>
                                            <input type="text" class="form-control" name="stok" value="{{ $row->stok }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select class="form-control" id="sizesSelectDefault" name="kategori">
                                                <option value="{{ $row->kategori }}" id="pilih" selected hidden>{{ $row->kategori }}</option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Perkakas">Perkakas</option>
                                                <option value="Alat Tulis">Alat Tulis</option>
                                                <option value="Hardware Komputer">Hardware Komputer</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Spesifikasi Teknis</label>
                                            <textarea class="form-control" name="spek">{{ $row->spek }}</textarea>
                                        </div>
                                    </div>
                                    <div class="container dialog-footer">
                                        <button class="btn-solid theme-primary" type="submit" id="submit">Ubah</button>
                                    </div>
                                </form>
                            </dialog>
                        </div>
                    @empty
                        <tr><td colspan = 6 style = 'text-align : center'>Tidak ada Data</td></tr>
                    @endforelse
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </main>
        <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    </body>
</html>