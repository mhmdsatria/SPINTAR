<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Muhamad Satria',
                'email'=>'SuperAdmin@gmail.com',
                'role'=>'SuperAdmin',
                'password'=>bcrypt('123456')
            ],
                        [
                'name'=>'Aldi Setiawan',
                'email'=>'Admin@gmail.com',
                'role'=>'Admin',
                'password'=>bcrypt('123456')
            ]
            ];

            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
