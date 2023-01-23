<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name'                  => ['required', 'string', 'max:255'],
        'email'                 => ['required', 'email', 'max:255'],
        'password'              => ['nullable', 'confirmed', 'min:8', 'max:255'],
        'password_confirmation' => ['nullable', 'min:8', 'max:255']
    ];

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->name  = auth()->user()->name;
    }

    public function updateProfile()
    {
        $this->validate();

        $user = auth()->user();
        $user->name = $this->name;

        if (
            $user->email !== $this->email &&
            $user instanceof MustVerifyEmail
        ) {
            $user->email             = $this->email;
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        } else {
            $user->email = $this->email;
        }

        if (isset($this->password)) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->reset(['password', 'password_confirmation']);

        return $this->dispatchBrowserEvent('profile-updated', [
            'msg' => 'Profile Updated!'
        ]);
    }

    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.auth');
    }
}
