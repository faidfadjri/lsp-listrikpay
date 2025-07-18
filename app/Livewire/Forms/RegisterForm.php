<?php

namespace App\Livewire\Forms;

use App\Models\User\User;
use App\Models\User\UserRole;
use App\Models\Customer\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Static\Roles;
use Illuminate\Support\Facades\Log;

class RegisterForm extends Component
{
    public $username, $email, $password, $password_confirmation;
    public $name, $phone_number, $address, $tarif_id, $meter_number;

    public function register()
    {
        try {
            $validated = Validator::make([
                'username'              => $this->username,
                'email'                 => $this->email,
                'password'              => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'name'                  => $this->name,
                'phone_number'          => $this->phone_number,
                'address'               => $this->address,
                'tarif_id'              => $this->tarif_id,
                'meter_number'          => $this->meter_number,
            ], [
                'username'              => 'required|string|unique:users,username',
                'email'                 => 'required|email|unique:users,email',
                'password'              => 'required|min:6|confirmed',
                'name'                  => 'required|string|max:255',
                'phone_number'          => 'nullable|string|max:20',
                'address'               => 'required|string',
                'tarif_id'              => 'required|exists:tarifs,tarif_id',
                'meter_number'          => 'required|string',
            ])->validate();

            $getCustomerRole = UserRole::where('name', Roles::CUSTOMER)->first();
            if (!$getCustomerRole) {
                $this->dispatch('notify', type: 'error', message: 'Role customer tidak ditemukan.');
                return;
            }

            if (!Roles::isValid($getCustomerRole->name)) {
                $this->dispatch('notify', type: 'error', message: 'Role customer tidak valid.');
                return;
            }

            $user = User::create([
                'name'      => $validated['name'],
                'username'   => $validated['username'],
                'email'     => $validated['email'],
                'password'  => Hash::make($validated['password']),
                'user_role' => $getCustomerRole->user_role_id,
            ]);

            Customer::create([
                'user_id'       => $user->id,
                'name'          => $validated['name'],
                'phone_number'  => $validated['phone_number'],
                'address'       => $validated['address'],
                'tarif_id'      => $validated['tarif_id'],
                'meter_number'  => $validated['meter_number'],
            ]);

            $this->reset();
            $this->dispatch('notify', type: 'success', message: 'Pendaftaran berhasil! Silakan login.');
        } catch (\Throwable $e) {
            Log::error("message: {$e->getMessage()}, file: {$e->getFile()}, line: {$e->getLine()}");
            $this->dispatch('notify', type: 'error', message: 'Terjadi kesalahan saat mendaftar.');
        }
    }

    public function render()
    {
        $tarifs = \App\Models\Customer\Tarif::all();
        return view('livewire.forms.register-form', [
            'tarifs' => $tarifs,
        ]);
    }
}