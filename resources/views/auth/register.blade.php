@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h2>Buat akun baru</h2>
    <p class="form-intro">Daftarkan akun untuk mulai menggunakan sistem inventaris gudang.</p>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   placeholder="Nama lengkap" autocomplete="name" maxlength="100" required autofocus>
            @error('name') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Alamat email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   placeholder="nama@perusahaan.com" autocomplete="username" required>
            @error('email') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Minimal 8 karakter" autocomplete="new-password" required>
            @error('password') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   placeholder="Ulangi password" autocomplete="new-password" required>
        </div>

        <button class="submit-button" type="submit">Buat Akun</button>
    </form>

    <p class="auth-switch">Sudah memiliki akun? <a href="{{ route('login') }}">Login di sini</a></p>
@endsection
