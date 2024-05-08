<?php

use App\Http\Controllers\PhonebookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::resource('phonebook', PhonebookController::class);
