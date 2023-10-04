<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UsuarioController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $user = User::find($request->user);
        var_dump($user);
        if (isset($user)) {
            $user->syncRoles($request->role);
            $user->save();
        }
        return redirect()->route('usuarios.index');
    }
    public function show($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('usuarios.show', compact('roles', 'user'));
    }
    public function edit(){
        //
    }
    public function update(){
        //
    }
    public function destroy(){
        //
    }
}
