<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class SpatieSeeder extends Seeder{
    public function run(){
        $roleAdmin = Role::findOrCreate('admin');
        $roleEditor = Role::findOrCreate('editor');
        $roleRevisor = Role::findOrCreate('revisor');

        Permission::findOrCreate('viewNoticia');
        Permission::findOrCreate('createNoticia');
        Permission::findOrCreate('updateNoticia');
        Permission::findOrCreate('deleteNoticia');

        $roleAdmin->givePermissionTo(['viewNoticia', 'createNoticia', 'updateNoticia', 'deleteNoticia']);
        $roleEditor->givePermissionTo(['viewNoticia', 'updateNoticia']);
        $roleRevisor->givePermissionTo('viewNoticia');

        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(2);
        $user->assignRole('editor');
        $user = User::find(3);
        $user->assignRole('revisor');
    }
}
