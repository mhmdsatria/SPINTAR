<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function showForm()
    {
        return view('konsultasi-form');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_whatsapp' => 'required|string|max:20',
            'deskripsi_masalah' => 'required|string',
            'lampiran' => 'nullable|file|max:5120', // Perbaiki nama validasi
            'tanggal_diajukan' => 'required|date',
            'jam_diajukan' => 'required|date_format:H:i',
        ]);
    
        $filePath = null;
        
        // Periksa dan simpan file dengan nama 'lampiran'
        if ($request->hasFile('lampiran')) {
            $filePath = $request->file('lampiran')->store('konsultasi_files', 'public');
        }
    
        // Siapkan data untuk dimasukkan ke database
        $dataToCreate = array_merge($validatedData, [
            'file_path' => $filePath, // Tetap gunakan 'file_path' karena ini nama kolom di DB
            'status' => 'pending',
        ]);
        
        // Buat record baru di database menggunakan Konsultasi::create()
        Konsultasi::create($dataToCreate);
    
        return redirect()->back()->with('success', 'Konsultasi Anda berhasil diajukan!');
    }
}