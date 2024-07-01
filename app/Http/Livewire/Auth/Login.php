<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    public $email, $password, $remember;
    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.guest')->section('content');
    }

    public function rules()
    {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }
    public function loginUser()
    {
        $this->validate();
        $throttKey = strtolower($this->email) . '|'. request()->ip();

        if(RateLimiter::tooManyAttempts($throttKey,5)){
            $this->addError('email',__('auth.throttle',[
                'seconds' => RateLimiter::availableIn($throttKey)
            ]));
            return null;
        }
        if(!Auth::attempt($this->only(['email','password']), $this->remember)){

            RateLimiter::hit($throttKey);
            
            $this->addError('email',__('auth.failed'));
            return null;
        }

        return redirect()->to('/home');
    }
}
