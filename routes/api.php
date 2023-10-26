<?php

use App\Http\Controllers\Api\NoticiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthProviderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('/noticias', NoticiaController::class);
    Route::patch('noticias/{noticia}', function(Request $request, Noticia $noticia){
        $noticia->titulo = $request->titulo;
        $noticia->save();

        return response()->json($noticia, 200);
    });
});

Route::post('/login', function (Request $request){
    $credenciais = $request->only(['email', 'password']);
    if(Auth::attempt($credenciais) === false){
        return response()->json('Nao Autorizado', 401);
    }
    $user = Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken('token');
    return response()->json(['token' => $token->plainTextToken]);
});
