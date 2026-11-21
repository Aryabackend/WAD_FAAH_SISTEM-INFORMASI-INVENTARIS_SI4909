<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Tata Letak</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Tambah Tata Letak Gudang</h1>

    <form class="form" action="{{ route('tata-letak.store') }}" method="POST">
        @csrf
        @include('tata-letak._form')
    </form>
</body>
</html>