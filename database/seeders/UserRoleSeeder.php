<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Static\Roles;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_roles')->insert([
            ['name' => Roles::ADMIN],
            ['name' => Roles::OFFICER],
            ['name' => Roles::CUSTOMER],
        ]);
    }
}