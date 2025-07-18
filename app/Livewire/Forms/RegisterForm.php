<?php

namespace App\Livewire\Forms;

use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $validated = Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ])->validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 2, // default role: 2 = pengguna biasa
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function render()
    {
        return view('livewire.forms.register-form');
    }
}