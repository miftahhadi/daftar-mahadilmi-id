<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin Akhawat',
            'email' => 'ypiacademy.putri@gmail.com',
            'password' => Hash::make('rahasia')
        ]);
        $user1->roles()->attach(1);

        $user2 = User::create([
            'name' => 'Admin Ikhwan',
            'email' => 'ypiacademy.putra@gmail.com',
            'password' => Hash::make('rahasia')
        ]);
        $user2->roles()->attach(2);

        $user3 = User::create([
            'name' => 'Root',
            'email' => 'mahadilmi.ikhwan@gmail.com',
            'password' => Hash::make('_kalam*haqiqi_')
        ]);
        $user3->roles()->attach(3);

    }
}
