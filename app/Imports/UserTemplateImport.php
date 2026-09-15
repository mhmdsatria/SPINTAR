<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserTemplateImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'name'  => $row['nama'],     // sesuai heading di template
            'email' => $row['email'],    // sesuai heading di template
            'password' => Hash::make($row['password']), // encrypt password
            'role'  => $row['role'],     // pastikan kolom "role" ada di tabel users
        ]);
    }
}
