<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    use PasswordValidationRules;

    public $currentStep = 1;
    public $first_name, $last_name, $gender, $terms;
    public $username, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => '',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        # Авторизация после регистрации
        if (Auth::attempt(['username' => $this->username,
                            'password' => $this->password]))
        {
            return redirect()->indended('dashboard');
        }

    }

    public function back($step)
    {
        $this->currentStep($step);
    }
}
