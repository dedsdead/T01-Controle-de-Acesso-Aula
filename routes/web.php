<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/noticias', NoticiaController::class)->middleware('auth');

Route::resource('/admin/noticias', NoticiaController::class)->middleware('auth:admin');
Route::resource('/admin/roles', RoleController::class);
Route::resource('/admin/permissoes', PermissaoController::class);
Route::resource('/admin/usuarios', UsuarioController::class);

Route::get('/login/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/login/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::post('/logout/admin',[LoginController::class,'logout'])->name('admin.logout');

Route::get('/register/admin',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/register/admin',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');

require __DIR__.'/auth.php';
