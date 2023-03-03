<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StateController;
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

/*Route::get('/',[ContactController::class,"show"]);

Route::get('/update', [ContactController::class,"update"]);

Route::post('/create', [ContactController::class,'store']);*/

//Route::get('/create', [ContactController::class,'add'])->name('create');
Route::get('/',[ContactController::class, 'show']);

Route::get('/create',[ContactController::class, 'create']);



Route::resource('contacts', ContactController::class);
Route::post('/contact-add',[ContactController::class,'store'])->name('contact.store');
Route::post('/import',[ContactController::class, 'import'])->name('contact.import');
Route::get('import-form',[ContactController::class,'importfile']);
Route::post('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');

//get states
Route::get('/get-states/{id}', [ContactController::class, 'getStates']);

Route::resource('register', RegisterController::class);
Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [LoginController::class, 'index'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');


