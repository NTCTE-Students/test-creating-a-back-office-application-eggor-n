<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;

Route::get('/', function () {
    return view('login');
});

Route::post('/', [ActionsController::class, 'login'])
-> name('login');

Route::get('/logout', function () {
    return view('logout');
});
Route::post('/logout', [ActionsController::class, 'logout'])
-> name('logout');