<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\UserRole;
use App\Static\Roles;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $getCustomerRole = UserRole::where('name', Roles::CUSTOMER)->first();
        if (!$getCustomerRole) {
            $this->dispatch('notify', type: 'error', message: 'Role customer tidak ditemukan.');
            return;
        }

        if (!Roles::isValid($getCustomerRole->name)) {
            $this->dispatch('notify', type: 'error', message: 'Role customer tidak valid.');
            return;
        }


        DB::table('users')->insert([
            'name'      => 'Mohamad Faid Fadjri',
            'username'  => 'faidfadjri',
            'email'     => 'faidfadjri@gmail.com',
            'password'  => bcrypt('password'),
            'user_role' => $getCustomerRole->user_role_id,
        ]);
    }
}
