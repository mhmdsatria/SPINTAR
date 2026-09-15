<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileTestController extends Controller
{
    public function uploadTest(Request $request)
    {
        
        if ($request->hasFile('file')) {
            try {
                $path = $request->file('file')->store('public/test_uploads');

                return "File berhasil diunggah! Path: " . $path;
            } catch (\Exception $e) {
                
                return "Gagal mengunggah file. Error: " . $e->getMessage();
            }
        }

        // Jika tidak ada file yang dikirim, tampilkan pesan error
        return "Tidak ada file yang dikirim.";
    }
}