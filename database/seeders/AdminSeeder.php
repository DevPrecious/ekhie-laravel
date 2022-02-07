<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'is_admin'=>'1',
            'password'=> bcrypt('password'),
        ];

        User::create($admin);
    }
}
