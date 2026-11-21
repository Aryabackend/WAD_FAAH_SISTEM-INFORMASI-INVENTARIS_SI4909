@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h2>Selamat datang</h2>
    <p class="form-intro">Masukkan email dan password untuk melanjutkan ke dashboard inventaris.</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Alamat email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   placeholder="nama@perusahaan.com" autocomplete="username" required autofocus>
            @error('email') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Masukkan password" autocomplete="current-password" required>
            @error('password') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <label class="remember-row" for="remember">
            <input id="remember" type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
            Ingat saya di perangkat ini
        </label>

        <button class="submit-button" type="submit">Masuk ke Sistem</button>
    </form>

    <p class="auth-switch">Belum memiliki akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
@endsection
