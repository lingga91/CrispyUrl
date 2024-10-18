<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\AnalyticsController;

Route::get('/', [UrlController::class, 'index']);
Route::get('/analytics', [AnalyticsController::class, 'index']); 
Route::get('/analytics/data', [AnalyticsController::class, 'loadData']); 
Route::get('/analytics/details/{url_id}', [AnalyticsController::class, 'details']); 
Route::get('/analytics/visitor/{url_id}', [AnalyticsController::class, 'loadVisitor']); 
Route::get('/{code}', [UrlController::class, 'loadUrl']); 
Route::post('create-url', [UrlController::class, 'create']);

