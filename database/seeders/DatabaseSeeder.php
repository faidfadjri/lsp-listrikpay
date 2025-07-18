<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserRoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserRoleSeeder::class);
    }
}
