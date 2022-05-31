<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\MortgagesController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'apartments');
Route::resource('apartments', ApartmentsController::class);
Route::resource('mortgages', MortgagesController::class);
