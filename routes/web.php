<?php

use App\Http\Controllers\AlterarSenhaController;
use App\Http\Controllers\NoticiaController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/noticias', NoticiaController::class);

Route::get('/alterarsenha/{id}', [AlterarSenhaController::class, 'edit'])->name('alterarsenha.edit');
Route::put('/alterarsenha/{id}', [AlterarSenhaController::class, 'update'])->name('alterarsenha.update');

Route::get('auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('social.login');

Route::get('auth/callback/{provider}', function ($provider) {
    $providerUser = Socialite::driver($provider)->user();

    $user = User::firstOrCreate([
        "email" => $providerUser->getEmail()
    ],[
        "name" => $providerUser->getName(),
        "admin" => 0,
        "provider" => $provider,
        "provider_id" => $providerUser->getId()
    ]);

    Auth::login($user);

    return redirect('/dashboard');

})->name('social.callback');

require __DIR__.'/auth.php';
