<?php

use App\Http\Controllers\ArmadaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('armada.index');
});

Route::resource('armada', ArmadaController::class)
    ->middleware('log.armada');