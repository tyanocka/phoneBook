<?php

use App\Http\Controllers\PhonebookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('phonebook', PhonebookController::class);
});
