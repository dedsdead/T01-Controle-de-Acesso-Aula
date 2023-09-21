<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    static $nomes = [
        'Diego',
    ];
    static $emails = [
        'diego@diego.com',
    ];

    public function run(){
        for ($i = 0; $i < count(self::$nomes); $i++)
            $admin = Admin::create([
                'name' => self::$nomes[$i],
                'email' => self::$emails[$i],
                'password' => Hash::make('123456789'),
            ]);
        $admin->save();
    }
}
