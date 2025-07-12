<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WelcomeController::class, 'welcome'])->name('home');

// Item routes
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/item/{item}', [ItemController::class, 'show'])->name('item.single');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.single');
Route::get('items/all', [ItemController::class, 'itemsPage'])->name('items.all');


Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.single');


//Route::get('/home', function () {
//    return view('welcome');
//})->name('welcome');

Route::get('/services', [ServiceController::class, 'servicesPage'])->name('services');

Route::get('/items', [PageController::class, 'items'])->name('items');


Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');



