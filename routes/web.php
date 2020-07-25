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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'ImageController@resizeImage');
Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');

//Fetch all images from folder and result reduce image size.  //image-compress-screipt
Route::get('/image-compress-screipt', 'ImageController@imageoptimizer')->name('image-compress-screipt');
