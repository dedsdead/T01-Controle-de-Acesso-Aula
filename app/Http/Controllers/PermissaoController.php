<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissaoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        //
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $role = Role::find($request->role);
        if (isset($role)) {
            $role->syncPermissions($request->permissao);
            $role->save();
        }
        return redirect()->route('roles.index');
    }
    public function show($id){
        $role = Role::find($id);
        $permissoes = Permission::all();
        $role_permissoes = $role->permissions;
        return view('permissoes.index', compact('role', 'permissoes', 'role_permissoes'));
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
