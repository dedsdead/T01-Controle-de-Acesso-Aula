<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlterarSenhaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function edit($id){
        $user = User::find($id);
        return view('alterarsenha.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('dashboard');
    }
}
