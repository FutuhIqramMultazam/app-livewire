<?php

namespace App\Livewire;


use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
                Rule::unique('employees', 'email')
            ],
            'alamat' => ['required'],
        ]);

        ModelsEmployee::create($validated);

        redirect()->with('berhasil', 'Data berhasil masuk.');
    }

    public function render()
    {
        $dataEmployees = ModelsEmployee::orderBy('nama', 'asc')
            ->paginate(5);
        return view('livewire.employee', compact('dataEmployees'));
    }
}
