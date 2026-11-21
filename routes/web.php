<?php

use App\Http\Controllers\TataLetakController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tata-letak');

Route::resource('tata-letak', TataLetakController::class)
    ->except('show')
    ->parameters(['tata-letak' => 'tataLetak']);