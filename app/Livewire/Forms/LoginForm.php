<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    public function login()
    {
        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if (Auth::guard()->attempt($credentials)) {
            session()->regenerate();
            $this->dispatch('notify', type: 'success', message: 'Login berhasil!');
            return;
        }

        $this->dispatch('notify', type: 'error', message: 'Username atau password salah.');
    }

    public function render()
    {
        return view('livewire.forms.login-form');
    }
}