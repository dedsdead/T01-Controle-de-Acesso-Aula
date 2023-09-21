<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class SpatieSeeder extends Seeder{
    public function run(){
        $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $roleEditor = Role::findOrCreate('editor');
        $roleRevisor = Role::findOrCreate('revisor');

        Permission::findOrCreate('viewNoticia');
        Permission::findOrCreate('createNoticia');
        Permission::findOrCreate('updateNoticia');
        Permission::findOrCreate('deleteNoticia');

        Permission::create(['guard_name' => 'admin', 'name' => 'viewNoticia']);
        Permission::create(['guard_name' => 'admin', 'name' => 'createNoticia']);
        Permission::create(['guard_name' => 'admin', 'name' => 'updateNoticia']);
        Permission::create(['guard_name' => 'admin', 'name' => 'deleteNoticia']);

        $roleAdmin->givePermissionTo(['viewNoticia', 'createNoticia', 'updateNoticia', 'deleteNoticia']);
        $roleEditor->givePermissionTo(['viewNoticia', 'updateNoticia']);
        $roleRevisor->givePermissionTo('viewNoticia');

        $user = Admin::find(1);
        $user->assignRole($roleAdmin);
        $user = User::find(2);
        $user->assignRole('editor');
        $user = User::find(3);
        $user->assignRole('revisor');
    }
}
