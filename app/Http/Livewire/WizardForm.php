<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class WizardForm extends Component
{
    public $currentStep = 1;
    public $formData = [];
    public $selectedCountry = 0;
    public $selectedState = 0;
    public $selectedCity = 0;

    public $country = [
        ['id' => 1, 'name' => 'India'],
        ['id' => 2, 'name' => 'USA']
    ];
    public $state = [
        ['id' => 1, 'name' => 'Gujarat', 'country_id' => 1],
        ['id' => 2, 'name' => 'Californiya', 'country_id' => 2],
    ];
    public $city = [
        ['id' => 1, 'name' => 'Ahmedabad', 'state_id' => 1],
        ['id' => 2, 'name' => 'Los Angeles', 'state_id' => 2],
    ];

    public function render()
    {
        return view('livewire.wizard-form');
    }

    public function nextStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'formData.fname' => 'required|alpha',
                'formData.lname' => 'required|alpha',
            ], [
                'formData.fname.required' => 'First Name field is required.',
                'formData.fname.alpha' => 'Please enter valid First Name.',
                'formData.lname.required' => 'Last Name field is required.',
                'formData.lname.alpha' => 'Please enter valid Last Name.',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'formData.email' => 'required|email',
                'formData.phone' => 'required|numeric|digits:10',
            ], [
                'formData.email.required' => 'Email field is required.',
                'formData.email.email' => 'Please enter valid Email.',
                'formData.phone.required' => 'Phone field is required.',
                'formData.phone.numeric' => 'Please enter valid Phone.',
                'formData.phone.digits' => 'Please enter Phone 10 digits.',
            ]);
        }
        $this->currentStep++;
    }

    public function prvStep()
    {
        $this->currentStep--;
    }

    // public function updatedSelectedCountry()
    // {
    //     $this->state = ($this->selectedCountry == 1) ? [
    //         ['id' => 1, 'name' => 'Gujarat', 'country_id' => 1]
    //     ] : [
    //         ['id' => 2, 'name' => 'Californiya', 'country_id' => 2]
    //     ];
    // }

    public function formSubmit()
    {
        $data = [
            'name' => $this->formData['fname'] . ' ' . $this->formData['lname'],
            'email' => $this->formData['email'],
            'password' => encrypt($this->formData['password']),
        ];
        if (User::create($data)) {
            session()->flash('message', 'Post successfully updated.');
        } else {
            session()->flash('error', 'Something wrong!');
        }
        return redirect()->route('wizard.form');
    }
}
