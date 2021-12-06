<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
        [
            'username' => 'admin',
            'name' => 'aji',
            'email' => 'admin@example.com',
            'level' => 'admin',
            'password' => bcrypt('admin123')
        ],
        [
            'username' => 'user',
            'name' => 'crysna',
            'email' => 'editor@example.com',
            'level' => 'editor',
            'password' => bcrypt('123456')
        ]
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
