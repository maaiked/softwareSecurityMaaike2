<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
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

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/blogs', [BlogController::class, 'index']);
Route::options('/blogs', [BlogController::class, 'options']);

// Routes only accessible when user is logged in
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/blogs/{blog}', [BlogController::class, 'show']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::put('/blogs/{blog}', [BlogController::class, 'update']);
    Route::delete('/blogs/{blog}', [BlogController::class, 'delete']);



    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/downloadUserInfo/{id}', [UserController::class, 'downloadUserInfo'])->name('downloadUserInfo');


// Routes only accessible by the admin
Route::group(['middleware'=>'admins'],function() {
    Route::get('/admin', function () {
        return view('admin');
    });
}); // end of middleware 'admins'


}); // end of middleware 'sanctum'

