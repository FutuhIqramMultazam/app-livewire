<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Employee extends Component
{
    public  $nama,
        $email,
        $alamat;

    public function store()
    {
        $validated = $this->validate([
            'nama' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'alamat' => ['required'],
        ]);

        ModelsEmployee::create($validated);

        redirect()->with('berhasil', 'Data berhasil masuk.');
    }

    public function render()
    {
        return view('livewire.employee');
    }
}
