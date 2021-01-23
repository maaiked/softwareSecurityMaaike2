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

// Routes accessible by anyone - even not logged in

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('dashboard');
});


// Routes only accessible when user is logged in
Route::middleware(['auth:sanctum', 'verified'])->group(function(){


Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');


// Routes only accessible by the admin
Route::group(['middleware'=>'admins'],function() {
    Route::get('/admin', function () {
        return view('admin');
    });
}); // end of middleware 'admins'


}); // end of middleware 'sanctum'

