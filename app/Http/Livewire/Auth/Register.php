<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;
    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.guest')->section('content');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed'],
        ];
    }

    public function registerUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        Auth::login($user, true);
        event(new Registered($user));
        return redirect()->to('/home');
    }
}
