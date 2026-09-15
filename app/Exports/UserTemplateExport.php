<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserTemplateExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        // Isi kosong untuk template
        return [
            ['nama - bidang', 'email@example.com', '123456', 'admin/super_admin'],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Password',
            'Role',
        ];
    }
}
