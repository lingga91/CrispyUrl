<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index']);
Route::post('create-url', [UrlController::class, 'create']);
