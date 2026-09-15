<?php

// app/Models/FileTest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
    ];
}