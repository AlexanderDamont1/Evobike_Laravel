<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('mocoso');
});

Route::get('evo', function () {
    return view('app');
});
