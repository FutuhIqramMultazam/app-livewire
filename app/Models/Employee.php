<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory, Searchable;
    protected $guarded = ['id'];

    public function toSearchableArray(): array
    {
        return [
            'nama' => $this->nama,
            'email' => $this->email,
            'alamat' => $this->alamat,
        ];
    }
}
