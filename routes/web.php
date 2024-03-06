<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Client;
use App\Models\User;


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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:2,1');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

// Route::get('/users', [AuthController::class, 'index'])->name('user.index');

Route::get('/list', function () {
    $data= Client::all();
    return view('list',["data"=>$data]);
});
Route::view('/add','add');
Route::post('/add',[AuthController::class,'create']);
Route::get('/edit/{id}', [AuthController::class, 'edit'])->name('edit');
// Route::post('/update/{id}', [AuthController::class, 'update'])->name('update');
Route::post('/update/{id}', [AuthController::class, 'update'])->name('update.details');

// Route::get('/delete/{id}', [AuthController::class, 'delete'])->name('delete');
Route::delete('/delete/{id}', [AuthController::class, 'delete'])->name('delete');

