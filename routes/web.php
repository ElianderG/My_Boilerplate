<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::inertia('/about', 'About', ['user' => 'Eliander'])->name('about');
