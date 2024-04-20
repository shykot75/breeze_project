<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::group(['as'=>'admin.','prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function (){
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');

    // User Routes
    Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('delete');
    });
});


Route::group(['as'=>'','prefix'=>'', 'middleware'=>['auth', 'verified','role:user']], function (){
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
});









