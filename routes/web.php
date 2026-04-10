<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unitcontroller;
use App\Http\Controllers\Detailcontroller;
use App\Http\Controllers\Ordercontroller;

Route::get('/', [Unitcontroller::class, 'index']);
Route::get('/detail/{id}', [Detailcontroller::class, 'detail']);

// Route::view('/form', 'order');
Route::get('/form', [Ordercontroller::class, 'order']);
Route::post('/form/store', [Ordercontroller::class, 'store'])->name('order.store');

// Route::get('/detail', function () {
//     return view('detail');
// });
