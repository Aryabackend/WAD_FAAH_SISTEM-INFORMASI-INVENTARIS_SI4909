<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\AuthController;



Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth', 'role:admin,user')->group(function(){
    Route::get('/', [DaftarBarangController::class, 'index'])->name('inventory.index');
});

Route::middleware('auth','role:admin')->group(function(){
    Route::post('/simpan', [DaftarBarangController::class, 'store'])->name('inventory.store');
    Route::put('/update/{id}', [DaftarBarangController::class, 'update'])->name('inventory.update');
    Route::delete('/delete/{id}', [DaftarBarangController::class, 'destroy'])->name('inventory.destroy');
});

?>


