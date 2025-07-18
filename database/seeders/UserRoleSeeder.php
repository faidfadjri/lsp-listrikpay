<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\UserRole;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        UserRole::create([
            'name' => 'Admin',
        ]);

        UserRole::create([
            'name' => 'Petugas',
        ]);   
    }
}
