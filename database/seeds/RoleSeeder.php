<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminAkhawat = Role::create([
            'role' => 'Admin Akhawat'
        ]);

        $adminIkhwan = Role::create([
            'role' => 'Admin Ikhwan'
        ]);

        $superAdmin = Role::create([
            'role' => 'Super Admin'
        ]);
    }
}
