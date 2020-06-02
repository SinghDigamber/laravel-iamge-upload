<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Create image upload form
Route::get('/image-upload', 'FileUpload@createForm');

// Store image
Route::post('/image-upload', 'FileUpload@fileUpload')->name('imageUpload');
