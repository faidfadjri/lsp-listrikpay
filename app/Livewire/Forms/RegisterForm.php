<?php

namespace App\Livewire\Forms;

use App\Models\Customer\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RegisterForm extends Component
{
    public $username, $password, $password_confirmation;
    public $name, $phone_number, $address, $tarif_id, $meter_number;

    public function register()
    {
        $validated = Validator::make([
            'username' => $this->username,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'tarif_id' => $this->tarif_id,
            'meter_number' => $this->meter_number,
        ], [
            'username' => 'required|string|unique:customers,username',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'required|string',
            'tarif_id' => 'required|exists:tarifs,id',
            'meter_number' => 'required|string',
        ])->validate();

        Customer::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'tarif_id' => $validated['tarif_id'],
            'meter_number' => $validated['meter_number'],
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function render()
    {
        $tarifs = \App\Models\Customer\Tarif::all();
        return view('livewire.forms.register-form', [
            'tarifs' => $tarifs,
        ]);
    }
}