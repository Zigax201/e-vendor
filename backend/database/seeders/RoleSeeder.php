<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'user'
            ],
            [
                'name' => 'admin'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
