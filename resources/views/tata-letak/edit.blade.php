<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Tata Letak</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Edit Tata Letak Gudang</h1>

    <form class="form" action="{{ route('tata-letak.update', $tataLetak) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tata-letak._form')
    </form>
</body>
</html>