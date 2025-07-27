<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/services', function () {
    return view('pages.services');
})->name('services');
Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
