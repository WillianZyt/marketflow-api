<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * @return void
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Admin'
            ]
        );

        Role::updateOrCreate(
            ['slug' => 'user'],
            [
                'name' => 'User'
            ]
        );
    }
}
