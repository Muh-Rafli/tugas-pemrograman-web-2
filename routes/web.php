<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', function () {
    return view('customer.index', ['title' => 'Customer']);
});

Route::get('/customer/create', function () {
    return view('customer.create', ['title' => 'Customer Create']);
});
