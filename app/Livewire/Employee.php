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

    public $nama,
        $email,
        $alamat,
        $updateData = false,
        $employee_id,
        $katakunci;

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

        $this->clear();
        redirect()->with('berhasil', 'Data berhasil masuk.');
    }

    public function edit($id)
    {
        $data = ModelsEmployee::find($id);
        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;
        $this->updateData = true;
        $this->employee_id = $id;
    }

    public function update()
    {
        $validated = $this->validate([
            'nama' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')
                    ->ignore($this->employee_id)
            ],
            'alamat' => ['required'],
        ]);

        ModelsEmployee::find($this->employee_id)
            ->update($validated);

        $this->clear();
        redirect()->with('berhasil', 'Data berhasil di update.');
    }

    public function clear()
    {
        $this->nama = '';
        $this->email = '';
        $this->alamat = '';
        $this->updateData = false;
        $this->employee_id = '';
    }

    public function delete()
    {
        $id = $this->employee_id;
        ModelsEmployee::find($id)->delete();
        $this->clear();
        redirect()->with('berhasil', 'Data berhasil di hapus.');
    }

    public function delete_confirmation($id)
    {
        $this->employee_id = $id;
    }

    public function render()
    {
        if ($this->katakunci != null) {
            $dataEmployees = ModelsEmployee::where('nama', 'like', '%' . $this->katakunci . '%')
                ->orderBy('nama', 'asc')
                ->paginate(5);
        } else {
            $dataEmployees = ModelsEmployee::orderBy('nama', 'asc')
                ->paginate(5);
        }
        return view('livewire.employee', compact('dataEmployees'));
    }
}
